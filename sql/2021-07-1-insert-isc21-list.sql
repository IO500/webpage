-- create new column for find_mixed
ALTER TABLE `submissions` ADD `find_mixed` DECIMAL(15,6) NOT NULL AFTER `find_hard`;

-- allow storage_data column to be empty
ALTER TABLE `submissions` CHANGE `storage_data` `storage_data` TEXT CHARACTER SET utf8 COLLATE utf8_bin NULL;

-- create ISC21 release
INSERT INTO `releases` (`id`, `acronym`, `release_date`, `enable_ranked_list`, `enable_10_node_list`, `enable_full_list`, `enable_historical_list`) VALUES (NULL, 'ISC21', '2021-07-02', '1', '1', '1', '1');

-- insert new submission records
    
INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    'Pengcheng Laboratory and Tsinghua University',
    'Pengcheng Cloudbrain-II on Atlas 900',
    'Pengcheng Laboratory',
    'MadFS',
    'Pengcheng',
    '512',
    '2021-06-09',
    '36864',
    'KylinOS',
    'v10sp1',
    '4.19.148',
    NULL,
    NULL,
    '1',
    '72',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    'Ethernet, 100 GBit, 2x',
    NULL,
    NULL,
    NULL,
    '3421.624277',
    '396872.8161',
    '2803.716632',
    '3716.573255',
    '3914.484508',
    '278101.3094',
    '287724.3512',
    '102419.383',
    '529803.4844',
    '410069.9443',
    '183148.5704',
    NULL,
    '209906.9187',
    '8991786.331'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    'Mohamad Chaarawi',
    'Endevour',
    'Intel',
    'DAOS',
    'Intel',
    '10',
    '2021-06-09',
    '1440',
    'CentOS',
    NULL,
    '4.18.0-240.22.1.el8_3.crt2.x86_64',
    NULL,
    NULL,
    '1.3.101',
    '144',
    '12',
    NULL,
    NULL,
    NULL,
    '8',
    'PMEM',
    NULL,
    'Infiniband, 200 GBit',
    NULL,
    NULL,
    NULL,
    '398.765034',
    '8671.647896',
    '586.050057',
    '389.251396',
    '205.708472',
    '13347.628',
    '7556.86236',
    '6278.339486',
    '12962.25606',
    '12320.82054',
    '5489.515231',
    NULL,
    '10042.81182',
    '5734.732097'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    NULL,
    'Lenovo-Lenox',
    'Lenovo',
    'DAOS',
    'Lenovo',
    '36',
    '2021-06-11',
    '3456',
    'CentOS',
    '7.7.1908',
    '3.10.0-1062.18.1.el7.x86_64',
    NULL,
    NULL,
    '1.3.101-2',
    '96',
    '12',
    NULL,
    NULL,
    NULL,
    '8',
    'PMEM',
    NULL,
    'Infiniband, 100 GBit, 2x',
    NULL,
    NULL,
    NULL,
    '176.37376',
    '5545.611607',
    '195.352199',
    '147.996627',
    '197.104677',
    '6968.232917',
    '3869.9816',
    '2114.92466',
    '11212.08341',
    '8835.444564',
    '3918.497644',
    NULL,
    '5775.439193',
    '6996.000113'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    'NSCC-GZ FS team',
    'Venus2',
    'National Supercomputer Center in GuangZhou',
    'kapok',
    'National',
    '18',
    '2021-06-11',
    '720',
    'CentOS',
    '7.6.1810',
    '3.10.0-957.el7.x86_64',
    NULL,
    NULL,
    '1.2',
    '40',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    'Ethernet, 100 GBit',
    NULL,
    NULL,
    NULL,
    '104.521769',
    '3195.530983',
    '139.65438',
    '97.208284',
    '90.817928',
    '1774.466137',
    '2905.24539',
    '841.565238',
    '7157.602221',
    '7358.679332',
    '2334.02749',
    NULL,
    '2770.609799',
    '7357.95568'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    NULL,
    'Google',
    'Google Cloud',
    'Lustre',
    'DDN',
    '1000',
    '2021-06-11',
    '5000',
    NULL,
    NULL,
    '4.18.0-305.3.1.el8.x86_64',
    '50',
    NULL,
    NULL,
    '5',
    NULL,
    'SSD',
    NULL,
    NULL,
    NULL,
    'SSD',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '282.780461',
    '1148.900933',
    '1273.164627',
    '38.783632',
    '185.050489',
    '1925.249725',
    '904.443383',
    '809.177119',
    '1900.699024',
    '1840.684722',
    '495.688865',
    NULL,
    '1498.197803',
    '829.234818'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    NULL,
    NULL,
    'Supermicro',
    'DAOS',
    'Supermicro',
    '10',
    '2021-06-11',
    '1120',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '1.13.101',
    '112',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '112.174143',
    '1535.629705',
    '163.248695',
    '88.264742',
    '96.820899',
    '3785.499014',
    '1720.793799',
    '1000.790372',
    '4405.937075',
    '2281.987628',
    '1476.884379',
    NULL,
    '131.407871',
    '2430.958209'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    'Craig Prescott',
    'HiPerGator',
    'University of Florida',
    'Lustre',
    'DDN',
    '140',
    '2021-06-14',
    '4480',
    'RedHat',
    '7.7',
    '3.10.0-1062.18.1.el7.x86_64',
    NULL,
    NULL,
    '5.2.1',
    '32',
    NULL,
    NULL,
    NULL,
    NULL,
    '240',
    'Flash',
    NULL,
    'Infiniband, 200 GBit',
    NULL,
    NULL,
    NULL,
    '181.369595',
    '400.726045',
    '471.263867',
    '30.251297',
    '234.497306',
    '269.898165',
    '241.026981',
    '149.203752',
    '1617.732748',
    '535.082749',
    '116.396349',
    NULL,
    '384.997275',
    '1766.080472'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    'Rui Feng',
    'OceanStor',
    'Olympus Storage Technology Innovation Lab',
    'OceanFS',
    'Huawei',
    '10',
    '2021-06-12',
    '960',
    'CentOS',
    '7.6.1810',
    '3.10.0-957',
    NULL,
    NULL,
    '8.1.0',
    '96',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '69.487468',
    '697.153517',
    '117.693402',
    '44.052149',
    '49.042359',
    '649.375424',
    '693.617778',
    '147.006598',
    '1627.183495',
    '752.040071',
    '174.19233',
    NULL,
    '327.059339',
    '12087.63653'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    NULL,
    'MeluXina',
    'LuxProvide',
    'Lustre',
    'DDN',
    '512',
    '2021-06-11',
    '12288',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '5.2.2',
    '24',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    'Flash',
    NULL,
    'Infiniband, 100 GBit',
    NULL,
    NULL,
    NULL,
    '112.064428',
    '336.254278',
    '549.874254',
    '6.91135',
    '94.179974',
    '280.919183',
    '147.136684',
    '219.917674',
    '740.134914',
    '617.751959',
    '81.596715',
    NULL,
    '309.342322',
    '1557.912359'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    'Osamu Tatebe',
    'Cygnus',
    'University of Tsukuba',
    'CHFS',
    'OSS',
    '10',
    '2021-06-07',
    '240',
    'CentOS',
    '7.9',
    '3.1',
    NULL,
    NULL,
    NULL,
    '24',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '30.385217',
    '727.606276',
    '71.836846',
    '12.14459',
    '13.628314',
    '1582.6159',
    '656.2416',
    '258.633235',
    '1955.423375',
    '602.414994',
    '279.39221',
    NULL,
    '841.24515',
    '1056.268758'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    NULL,
    'Govorun',
    'Joint Institute of Nuclear Research',
    'DAOS',
    'RSC',
    '10',
    '2021-06-10',
    '160',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '1.2',
    '16',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '20.193628',
    '863.692659',
    '16.746869',
    '19.741594',
    '13.336159',
    '1102.72095',
    '741.151972',
    '343.16937',
    '2016.176058',
    '983.473306',
    '714.15635',
    NULL,
    '629.058439',
    '1239.41598'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    'Tsuyoshi NAKAGAWA',
    'Earth',
    'Japan Agency for Marine-Earth Science and Technology',
    'Lustre',
    'DDN',
    '10',
    '2021-06-10',
    '320',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '32',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    'HDD',
    NULL,
    'Infiniband, 200 GBit, 2x',
    NULL,
    NULL,
    NULL,
    '48.190182',
    '215.380186',
    '221.612186',
    '5.125428',
    '18.658181',
    '144.722921',
    '97.618424',
    '41.864914',
    '1258.25139',
    '382.98422',
    '18.442281',
    NULL,
    '168.992899',
    '5213.09067'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    NULL,
    'Janelia',
    'Howard Hughes Medical Institute Janelia Research Campus',
    NULL,
    'Weka.io',
    '10',
    '2021-06-11',
    '300',
    'Oracle',
    '8.3',
    '4.18.0-240.el8',
    NULL,
    NULL,
    '3.11.5',
    '30',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    'Ethernet, 100 GBit, 2x',
    NULL,
    NULL,
    NULL,
    '18.171561',
    '216.219114',
    '48.687682',
    '9.083212',
    '4.790896',
    '174.935086',
    '276.439559',
    '25.689328',
    '848.353722',
    '838.068879',
    '23.154243',
    NULL,
    '188.393013',
    '1239.854533'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    NULL,
    'PACE-Phoenix',
    'Georgia Institute of Technology',
    'Lustre',
    'DDN',
    '10',
    '2021-06-10',
    '240',
    'RedHat',
    '7.6',
    '3.10.0-957.27.2.el7.x86_64',
    '2',
    NULL,
    NULL,
    '24',
    '2',
    'Other',
    NULL,
    NULL,
    '8',
    'Other',
    NULL,
    'Infiniband, 100 GBit, 2x',
    NULL,
    NULL,
    NULL,
    '4.520995',
    '64.478496',
    '14.107625',
    '0.675675',
    '2.316457',
    '48.756646',
    '28.962735',
    '25.933313',
    '130.680369',
    '91.318479',
    '18.770173',
    NULL,
    '33.149291',
    '1098.692729'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    NULL,
    NULL,
    'Howard Hughes Medical Institute Janelia Research Campus',
    'nrsv',
    'NFS',
    '10',
    '2021-06-10',
    '300',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '30',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '7.541338',
    '31.837698',
    '19.390679',
    '1.279038',
    '6.222268',
    '37.160039',
    '43.355328',
    '1.293659',
    '216.421156',
    '128.454487',
    '1.360544',
    NULL,
    '100.284442',
    '133.536363'
);


INSERT INTO submissions (
    status,
    release_id,
    information_identifier,
    information_submitter,
    information_system,
    information_institution,
    information_filesystem_type,
    information_storage_vendor,
    information_client_nodes,
    information_submission_date,
    information_client_total_procs,
    information_client_procs_per_node,
    information_client_operating_system,
    information_client_operating_system_version,
    information_client_kernel_version,
    information_storage_install_date,
    information_filesystem_name,
    information_filesystem_version,
    information_md_nodes,
    information_md_storage_devices,
    information_md_storage_type,
    information_md_storage_interface,
    information_ds_nodes,
    information_ds_storage_devices,
    information_ds_storage_type,
    information_ds_storage_interface,
    information_ds_network,
    information_ds_operating_system_version,
    information_note,
    io500_bw,
    io500_md,
    ior_easy_write,
    ior_easy_read,
    ior_hard_write,
    ior_hard_read,
    mdtest_easy_stat,
    mdtest_easy_delete,
    mdtest_easy_write,
    mdtest_hard_read,
    mdtest_hard_stat,
    mdtest_hard_delete,
    mdtest_hard_write,
    find_mixed
)
VALUES (
    'VALID',
    '9',
    NULL,
    NULL,
    'Mistral',
    'DKRZ',
    'Lustre',
    'Seagate/Cray',
    '10',
    '2021-06-04',
    '80',
    NULL,
    NULL,
    '2.6.32-754.33.1.el6.x86_64',
    '4',
    NULL,
    NULL,
    '8',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '1.159355',
    '23.499735',
    '25.056288',
    '0.042972',
    '0.081607',
    '13.679607',
    '16.824885',
    '9.330521',
    '89.850219',
    '62.669171',
    '9.91424',
    NULL,
    '1.623404',
    '477.873593'
);

-- create IO500 table for new release
CREATE TABLE `list_isc21_io500` (
  `id` SERIAL NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `score` double NOT NULL
);

-- create 10-node table for new release
CREATE TABLE `list_isc21_10node` (
  `id` SERIAL NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `score` double NOT NULL
);

-- create full table for new release
CREATE TABLE `list_isc21_full` (
  `id` SERIAL NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `score` double NOT NULL
);

-- create historical table for new release
CREATE TABLE `list_isc21_historical` (
  `id` SERIAL NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `score` double NOT NULL
);

-- create the listings
INSERT INTO `listings` (`id`, `type_id`, `release_id`, `description`) VALUES (NULL, '1', '9', ''), (NULL, '2', '9', ''), (NULL, '3', '9', ''), (NULL, '4', '9', '');

-- insert records and score for IO500 list

INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '517', '36850.36855');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '518', '1859.55639');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '1', '1792.98');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '519', '988.989572');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '3', '938.95');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '5', '763.8');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '520', '577.929537');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '521', '569.988364');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '10', '537.31');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '15', '453.68');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '522', '415.039693');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '19', '282.45');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '523', '269.591396');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '21', '267.25');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '454', '253.57');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '22', '249.5');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '455', '239.37');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '23', '229.45');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '524', '220.098689');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '24', '210.26');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '525', '194.11889');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '457', '167.64');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '526', '148.689189');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '37', '137.03');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '459', '134.09');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '527', '132.064713');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '460', '125.5');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '528', '101.878409');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '47', '99.64');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '52', '94.86');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '55', '90.87');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '58', '82.57');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '463', '75.75');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '64', '70.91');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '67', '67.78');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '72', '64.29');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '75', '63.88');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '529', '62.682045');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '82', '57.17');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '86', '52.96');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '465', '50.58');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '90', '47.55');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '98', '39.65');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '101', '37.16');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '124', '21.55');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '129', '18.72');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '469', '17.55');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '530', '17.073576');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '470', '16.12');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '531', '15.495123');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '141', '14.91');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '150', '12.5');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '157', '11.31');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '472', '10.68');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '184', '7.05');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '188', '6.42');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '532', '5.219629');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '206', '4.19');

-- insert records and score for 10-node list

INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '517', '36850.36855');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '518', '1859.55639');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '1', '1792.98');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '519', '988.989572');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '3', '938.95');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '5', '763.8');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '520', '577.929537');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '521', '569.988364');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '10', '537.31');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '15', '453.68');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '522', '415.039693');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '19', '282.45');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '523', '269.591396');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '21', '267.25');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '454', '253.57');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '22', '249.5');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '455', '239.37');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '23', '229.45');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '524', '220.098689');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '24', '210.26');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '525', '194.11889');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '457', '167.64');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '526', '148.689189');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '37', '137.03');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '459', '134.09');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '527', '132.064713');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '460', '125.5');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '528', '101.878409');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '47', '99.64');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '52', '94.86');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '55', '90.87');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '58', '82.57');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '463', '75.75');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '64', '70.91');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '67', '67.78');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '72', '64.29');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '75', '63.88');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '529', '62.682045');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '82', '57.17');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '86', '52.96');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '465', '50.58');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '90', '47.55');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '98', '39.65');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '101', '37.16');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '124', '21.55');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '129', '18.72');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '469', '17.55');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '530', '17.073576');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '470', '16.12');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '531', '15.495123');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '141', '14.91');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '150', '12.5');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '157', '11.31');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '472', '10.68');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '184', '7.05');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '188', '6.42');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '532', '5.219629');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '206', '4.19');

-- insert the records in the full list

INSERT INTO list_isc21_full (listing_id, submission_id, score) SELECT '27', submission_id, score FROM list_sc20_full;
INSERT INTO list_isc21_full (listing_id, submission_id, score) SELECT '27', submission_id, score FROM list_isc21_io500;

-- insert the records in the historical list

INSERT INTO list_isc21_historical (listing_id, submission_id, score) SELECT '28', submission_id, score FROM list_sc20_historical;
INSERT INTO list_isc21_historical (listing_id, submission_id, score) SELECT '28', submission_id, score FROM list_isc21_io500;

-- remove existing view
DROP VIEW listings_submissions;

-- update view
CREATE VIEW listings_submissions AS

SELECT * FROM list_sc17_io500
UNION ALL

SELECT * FROM list_isc18_io500
UNION ALL

SELECT * FROM list_isc19_10node
UNION ALL
SELECT * FROM list_isc19_full
UNION ALL
SELECT * FROM list_isc19_io500
UNION ALL

SELECT * FROM list_isc20_10node
UNION ALL
SELECT * FROM list_isc20_full
UNION ALL
SELECT * FROM list_isc20_historical
UNION ALL
SELECT * FROM list_isc20_io500
UNION ALL

SELECT * FROM list_sc18_10node
UNION ALL
SELECT * FROM list_sc18_io500
UNION ALL
SELECT * FROM list_sc18_star_10node
UNION ALL
SELECT * FROM list_sc18_star_io500
UNION ALL

SELECT * FROM list_sc19_10node
UNION ALL
SELECT * FROM list_sc19_full
UNION ALL
SELECT * FROM list_sc19_historical
UNION ALL
SELECT * FROM list_sc19_io500
UNION ALL
SELECT * FROM list_sc19_scc
UNION ALL

SELECT * FROM list_sc20_10node
UNION ALL
SELECT * FROM list_sc20_full
UNION ALL
SELECT * FROM list_sc20_historical
UNION ALL
SELECT * FROM list_sc20_io500
UNION ALL

SELECT * FROM list_isc21_10node
UNION ALL
SELECT * FROM list_isc21_full
UNION ALL
SELECT * FROM list_isc21_historical
UNION ALL
SELECT * FROM list_isc21_io500;
