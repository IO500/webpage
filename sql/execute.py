import os
import sys
import hashlib
import logging
import logging.handlers
import MySQLdb
import datetime

logger = logging.getLogger('SQL')
logger.setLevel(logging.DEBUG)

ch = logging.StreamHandler()
ch.setLevel(logging.DEBUG)

# Configure the logger format
formatter = logging.Formatter(
    '%(asctime)s - %(name)s - %(levelname)s [%(lineno)d] %(message)s'
)

ch.setFormatter(formatter)

logger.addHandler(ch)

try:
    connection = MySQLdb.connect(
        host=os.environ['DATABASE_HOST'],
        user=os.environ['DATABASE_USER'],
        passwd=os.environ['DATABASE_PASSWORD'],
        db=os.environ['DATABASE_NAME']
    )

    logger.info('connected to MySQL')
except Exception as e:
    print("Error %d: %s" % (e.args[0], e.args[1]))

    sys.exit(1)

cursor = connection.cursor(MySQLdb.cursors.DictCursor)

with os.scandir('.') as entries:
    for entry in entries:
        # List all .sql files in directory
        if entry.is_file() and entry.name.endswith('.sql'):
            with open(entry.name, 'r') as f:
                content = f.read()

                tag = hashlib.sha256(str(content).encode('utf-8')).hexdigest()

                logger.info('FILE: {} [{}]'.format(entry.name, tag[0:7]))

                # Verify if the query was already executed
                query = """
                    SELECT
                        *
                    FROM
                        sqls
                    WHERE
                        tag = '{}'
                    ORDER BY id ASC
                """.format(
                    tag
                )

                try:
                    cursor.execute(query)
                except Exception as e:
                    logger.error(e)

                row = cursor.fetchone()

                if row is None:
                    # Execute the query
                    logger.info('Running...')

                    try:
                        cursor.execute(content)
                    except Exception as e:
                        logger.error(e)

                    logger.info('Complete!')

                    # Record query execution
                    query = """
                        INSERT INTO sqls (file, tag, executed)
                        VALUES ('{}', '{}', '{}')
                    """.format(
                        entry.name,
                        tag,
                        datetime.datetime.now()
                    )

                    try:
                        cursor.execute(query)
                    except Exception as e:
                        logger.error(e)
                else:
                    logger.info('{}: OK'.format(tag))

connection.commit()

cursor.close()
connection.close()
