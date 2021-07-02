-- clean for fresh update

TRUNCATE TABLE `list_isc21_10node`;
TRUNCATE TABLE `list_isc21_io500`;
TRUNCATE TABLE `list_isc21_full`;
TRUNCATE TABLE `list_isc21_historical`;

-- clean submissions from ISC21 for fresh insert

DELETE FROM submissions WHERE release_id = 9;

-- insert the submissions

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
    '72',
    'KylinOS',
    'v10sp1',
    '4.19.148',
    '2020-10',
    'Pengcheng',
    '1',
    NULL,
    NULL,
    NULL,
    NULL,
    '512',
    NULL,
    NULL,
    NULL,
    'Ethernet, 100 GBit, 2x',
    NULL,
    NULL,
    '3421.624277',
    '396872.8161',
    '3360.298674',
    '2803.716632',
    '3716.573255',
    '3914.484508',
    '529803.4844',
    '287724.3512',
    '278101.3094',
    '209906.9187',
    '410069.9443',
    '183148.5704',
    '102419.383',
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
    'Craig Prescott',
    'HiPerGator',
    'University of Florida',
    'Lustre',
    'DDN',
    '140',
    '2021-06-14',
    '4480',
    '32',
    'RedHat',
    '7.7',
    '3.10.0-1062.18.1.el7.x86_64',
    '2021-03',
    'Red',
    '5.2.1',
    NULL,
    NULL,
    NULL,
    NULL,
    '40',
    '240',
    'Flash',
    'NVMe',
    'Infiniband, 200 GBit',
    '7.7',
    NULL,
    '181.369595',
    '400.726045',
    '323.677069',
    '471.263867',
    '30.251297',
    '234.497306',
    '1617.732748',
    '241.026981',
    '269.898165',
    '384.997275',
    '535.082749',
    '116.396349',
    '149.203752',
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
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL
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
    '16',
    NULL,
    NULL,
    NULL,
    '2021-04',
    'RSC',
    '1.2',
    NULL,
    NULL,
    NULL,
    NULL,
    '8',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '20.193628',
    '863.692659',
    '37.714715',
    '16.746869',
    '19.741594',
    '13.336159',
    '2016.176058',
    '741.151972',
    '1102.72095',
    '629.058439',
    '983.473306',
    '714.15635',
    '343.16937',
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
    NULL,
    NULL,
    'Supermicro',
    'DAOS',
    'Supermicro',
    '10',
    '2021-06-11',
    '1120',
    '112',
    NULL,
    NULL,
    NULL,
    NULL,
    'SYS-120U-TNR',
    '1.13.101',
    NULL,
    NULL,
    NULL,
    NULL,
    '4',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '112.174143',
    '1535.629705',
    '113.491924',
    '163.248695',
    '88.264742',
    '96.820899',
    '4405.937075',
    '1720.793799',
    '3785.499014',
    '131.407871',
    '2281.987628',
    '1476.884379',
    '1000.790372',
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
    'NSCC-GZ FS team',
    'Venus2',
    'National Supercomputer Center in GuangZhou',
    'kapok',
    'National',
    '10',
    '2021-06-11',
    '480',
    '48',
    'CentOS',
    '7.6.1810',
    '3.10.0-957.el7.x86_64',
    '2021-04-28',
    'Venus2',
    '1.2',
    NULL,
    NULL,
    NULL,
    NULL,
    '38',
    NULL,
    NULL,
    NULL,
    'Ethernet, 100 GBit',
    NULL,
    NULL,
    '91.635022',
    '2452.868383',
    '95.160713',
    '90.207121',
    '93.938078',
    '87.439121',
    '4051.274375',
    '2462.458052',
    '1573.213289',
    '2301.662948',
    '3092.230319',
    '1964.27043',
    '804.639783',
    '7422.146411'
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
    '8',
    NULL,
    NULL,
    '2.6.32-754.33.1.el6.x86_64',
    NULL,
    'Lustre02',
    NULL,
    '4',
    NULL,
    NULL,
    NULL,
    '147',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '1.159355',
    '23.499735',
    '20.560488',
    '25.056288',
    '0.042972',
    '0.081607',
    '89.850219',
    '16.824885',
    '13.679607',
    '1.623404',
    '62.669171',
    '9.91424',
    '9.330521',
    '477.873593'
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
    'Vast',
    'Vast',
    '80',
    '2021-06-10',
    '2880',
    '36',
    'Oracle',
    '8.3',
    '4.18.0-240.el8.x86_64',
    NULL,
    'nrsv',
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
    NULL,
    '16.141579',
    '42.548082',
    '35.314223',
    '122.271113',
    '2.783236',
    '5.648857',
    '492.98776',
    '80.535191',
    '52.303738',
    '133.519257',
    '141.481713',
    '1.731332',
    '2.078286',
    '76.094887'
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
    '24',
    'CentOS',
    '7.9',
    '3.1',
    NULL,
    'CHFS',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '68',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '30.385217',
    '727.606276',
    '71.693064',
    '71.836846',
    '12.14459',
    '13.628314',
    '1955.423375',
    '656.2416',
    '1582.6159',
    '841.24515',
    '602.414994',
    '279.39221',
    '258.633235',
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
    'Google',
    'Google Cloud',
    'Lustre',
    'DDN',
    '1000',
    '2021-06-11',
    '5000',
    '5',
    NULL,
    NULL,
    '4.18.0-305.3.1.el8.x86_64',
    NULL,
    'DDN-GCP-LocalSSD',
    NULL,
    '50',
    NULL,
    'SSD',
    'NVMe',
    '200',
    NULL,
    'SSD',
    'NVMe',
    NULL,
    NULL,
    NULL,
    '282.780461',
    '1148.900933',
    '699.800593',
    '1273.164627',
    '38.783632',
    '185.050489',
    '1900.699024',
    '904.443383',
    '1925.249725',
    '1498.197803',
    '1840.684722',
    '495.688865',
    '809.177119',
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
    'Rui Feng',
    'OceanStor',
    'Olympus Storage Technology Innovation Lab',
    'OceanFS',
    'Huawei',
    '10',
    '2021-06-12',
    '960',
    '96',
    'CentOS',
    '7.6.1810',
    '3.10.0-957',
    '2021-04-30',
    'OceanStor',
    '8.1.0',
    NULL,
    NULL,
    NULL,
    NULL,
    '40',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '69.487468',
    '697.153517',
    '91.692831',
    '117.693402',
    '44.052149',
    '49.042359',
    '1627.183495',
    '693.617778',
    '649.375424',
    '327.059339',
    '752.040071',
    '174.19233',
    '147.006598',
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
    'Janelia',
    'Howard Hughes Medical Institute Janelia Research Campus',
    'Qumulo',
    'Qumulo',
    '10',
    '2021-06-11',
    '400',
    '40',
    NULL,
    NULL,
    NULL,
    NULL,
    'nearline4',
    '4.1.1',
    NULL,
    NULL,
    NULL,
    NULL,
    '80',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2.340384',
    '10.535286',
    '5.902525',
    '8.815466',
    '0.136026',
    '4.238794',
    '138.687922',
    '6.200021',
    '11.993322',
    '60.28316',
    '109.325251',
    '0.121732',
    '0.148326',
    '123.669319'
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
    '10',
    '2021-06-11',
    '960',
    '96',
    'CentOS',
    '7.7.1908',
    '3.10.0-1062.18.1.el7.x86_64',
    '2020-04',
    'Lenovo',
    '1.3.101-2',
    NULL,
    NULL,
    NULL,
    NULL,
    '12',
    NULL,
    NULL,
    NULL,
    NULL,
    '7.9.2009',
    NULL,
    '105.276201',
    '3567.847794',
    '112.999945',
    '108.468716',
    '108.445586',
    '92.411538',
    '9277.016263',
    '1982.357356',
    '4815.063677',
    '1923.210161',
    '8016.986057',
    '2217.838889',
    '1714.672326',
    '5057.189716'
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
    '96',
    'CentOS',
    '7.7.1908',
    '3.10.0-1062.18.1.el7.x86_64',
    '2020-04',
    'Lenovo',
    '1.3.101-2',
    NULL,
    '12',
    NULL,
    NULL,
    '12',
    '8',
    'PMEM',
    'NVDIMM',
    'Infiniband, 100 GBit, 2x',
    '7.9.2009',
    NULL,
    '176.37376',
    '5545.611607',
    '169.812184',
    '195.352199',
    '147.996627',
    '197.104677',
    '11212.08341',
    '3869.9816',
    '6968.232917',
    '5775.439193',
    '8835.444564',
    '3918.497644',
    '2114.92466',
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
    NULL,
    'Janelia',
    'Howard Hughes Medical Institute Janelia Research Campus',
    'Weka.io',
    'Weka.io',
    '10',
    '2021-06-11',
    '300',
    '30',
    'Oracle',
    '8.3',
    '4.18.0-240.el8',
    NULL,
    'SharedScratch',
    '3.11.5',
    NULL,
    NULL,
    NULL,
    NULL,
    '20',
    NULL,
    NULL,
    NULL,
    'Ethernet, 100 GBit, 2x',
    NULL,
    NULL,
    '18.171561',
    '216.219114',
    '51.462831',
    '48.687682',
    '9.083212',
    '4.790896',
    '848.353722',
    '276.439559',
    '174.935086',
    '188.393013',
    '838.068879',
    '23.154243',
    '25.689328',
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
    'Tsuyoshi NAKAGAWA',
    'Earth',
    'Japan Agency for Marine-Earth Science and Technology',
    'Lustre',
    'DDN',
    '10',
    '2021-06-10',
    '320',
    '32',
    NULL,
    NULL,
    NULL,
    NULL,
    'Data',
    NULL,
    '8',
    NULL,
    NULL,
    NULL,
    '20',
    NULL,
    'HDD',
    NULL,
    'Infiniband, 200 GBit, 2x',
    NULL,
    NULL,
    '48.190182',
    '215.380186',
    '254.47268',
    '221.612186',
    '5.125428',
    '18.658181',
    '1258.25139',
    '97.618424',
    '144.722921',
    '168.992899',
    '382.98422',
    '18.442281',
    '41.864914',
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
    'Pengcheng Laboratory and Tsinghua University',
    'Pengcheng',
    'Pengcheng Laboratory',
    'MadFS',
    'Pengcheng',
    '10',
    '2021-06-09',
    '1800',
    '180',
    'KylinOS',
    'v10sp1',
    '4.19.148',
    '2020-10',
    'Pengcheng',
    '1',
    NULL,
    NULL,
    NULL,
    NULL,
    '50',
    NULL,
    NULL,
    NULL,
    'Ethernet, 100 GBit, 2x',
    NULL,
    NULL,
    '193.766302',
    '34777.26707',
    '222.98751',
    '149.939929',
    '197.272',
    '213.722239',
    '36333.26805',
    '26920.99693',
    '19176.71015',
    '15692.36304',
    '35438.07969',
    '15239.97183',
    '8494.136829',
    '1584644.889'
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
    '24',
    NULL,
    NULL,
    NULL,
    '2021-06',
    'Tier-1-Scratch',
    '5.2.2',
    NULL,
    NULL,
    NULL,
    NULL,
    '48',
    NULL,
    'Flash',
    'NVMe',
    'Infiniband, 100 GBit',
    NULL,
    NULL,
    '112.064428',
    '336.254278',
    '440.642412',
    '549.874254',
    '6.91135',
    '94.179974',
    '740.134914',
    '147.136684',
    '280.919183',
    '309.342322',
    '617.751959',
    '81.596715',
    '219.917674',
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
    NULL,
    'PACE-Phoenix',
    'Georgia Institute of Technology',
    'Lustre',
    'DDN',
    '10',
    '2021-06-10',
    '240',
    '24',
    'RedHat',
    '7.6',
    '3.10.0-957.27.2.el7.x86_64',
    NULL,
    'lustre',
    NULL,
    '2',
    '2',
    'Other',
    'NVMe',
    '8',
    '8',
    'Other',
    NULL,
    'Infiniband, 100 GBit, 2x',
    '7.7.1908',
    NULL,
    '4.520995',
    '64.478496',
    '18.919953',
    '14.107625',
    '0.675675',
    '2.316457',
    '130.680369',
    '28.962735',
    '48.756646',
    '33.149291',
    '91.318479',
    '18.770173',
    '25.933313',
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
    'NSCC-GZ FS team',
    'Venus2',
    'National Supercomputer Center in GuangZhou',
    'kapok',
    'National',
    '18',
    '2021-06-11',
    '720',
    '40',
    'CentOS',
    '7.6.1810',
    '3.10.0-957.el7.x86_64',
    '2021-04-28',
    'Venus2',
    '1.2',
    NULL,
    NULL,
    NULL,
    NULL,
    '38',
    NULL,
    NULL,
    NULL,
    'Ethernet, 100 GBit',
    NULL,
    NULL,
    '104.521769',
    '3195.530983',
    '96.804951',
    '139.65438',
    '97.208284',
    '90.817928',
    '7157.602221',
    '2905.24539',
    '1774.466137',
    '2770.609799',
    '7358.679332',
    '2334.02749',
    '841.565238',
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
    'Tsuyoshi NAKAGAWA',
    'Earth',
    'Japan Agency for Marine-Earth Science and Technology',
    'Lustre',
    'DDN',
    '10',
    '2021-06-10',
    '320',
    '32',
    NULL,
    NULL,
    NULL,
    NULL,
    'Data',
    NULL,
    '8',
    NULL,
    NULL,
    NULL,
    '20',
    NULL,
    'HDD',
    NULL,
    'Infiniband, 200 GBit, 2x',
    NULL,
    NULL,
    '21.263676',
    '294.616219',
    '130.357622',
    '129.833007',
    '0.834591',
    '14.472982',
    '1368.830483',
    '179.9949',
    '320.721148',
    '152.622551',
    '552.901091',
    '28.13271',
    '50.83903',
    '5951.696313'
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
    'Endeavour',
    'Intel',
    'DAOS',
    'Intel',
    '10',
    '2021-06-09',
    '1440',
    '144',
    'CentOS',
    NULL,
    '4.18.0-240.22.1.el8_3.crt2.x86_64',
    '2020-09',
    'DAOS',
    '1.3.101',
    NULL,
    '12',
    NULL,
    NULL,
    '40',
    '8',
    'PMEM',
    'NVDIMM',
    'Infiniband, 200 GBit',
    '7',
    NULL,
    '398.765034',
    '8671.647896',
    '538.829306',
    '586.050057',
    '389.251396',
    '205.708472',
    '12962.25606',
    '7556.86236',
    '13347.628',
    '10042.81182',
    '12320.82054',
    '5489.515231',
    '6278.339486',
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
    NULL,
    'Howard Hughes Medical Institute Janelia Research Campus',
    'nrsv',
    'Vast',
    '10',
    '2021-06-10',
    '300',
    '30',
    'Oracle',
    '8.3',
    NULL,
    NULL,
    'nrsv',
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
    NULL,
    '7.541338',
    '31.837698',
    '20.958894',
    '19.390679',
    '1.279038',
    '6.222268',
    '216.421156',
    '43.355328',
    '37.160039',
    '100.284442',
    '128.454487',
    '1.360544',
    '1.293659',
    '133.536363'
);

-- ten node

INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '549', '2595.89338');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '554', '1859.55639');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '6', '758.71');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '545', '612.869856');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '12', '508.88');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '538', '474.097721');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '16', '440.64');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '537', '415.039693');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '22', '249.5');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '455', '239.37');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '543', '220.098689');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '457', '167.64');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '458', '161.53');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '30', '156.51');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '541', '148.689189');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '536', '132.064713');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '462', '109.91');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '548', '101.878409');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '47', '99.64');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '58', '82.57');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '59', '78.54');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '66', '69.92');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '69', '66.8');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '75', '63.88');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '78', '60.25');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '464', '57.99');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '82', '57.17');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '87', '52.58');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '94', '43.04');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '98', '39.65');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '108', '32.79');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '467', '32.2');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '468', '29.81');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '124', '21.55');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '131', '18.25');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '551', '17.073576');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '470', '16.12');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '136', '15.61');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '555', '15.495123');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '138', '15.39');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '146', '12.89');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '152', '12.43');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '471', '11.34');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '157', '11.31');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '472', '10.68');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '473', '10.64');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '166', '9.31');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '184', '7.05');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '187', '6.63');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '188', '6.42');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '539', '5.219629');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '544', '4.965543');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '206', '4.19');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '208', '3.67');


INSERT INTO list_isc21_10node (listing_id, submission_id, score)
VALUES ('25', '212', '3.06');

-- io500 list

INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '533', '36850.36855');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '554', '1859.55639');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '1', '1792.98');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '546', '988.989572');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '3', '938.95');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '5', '763.8');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '552', '577.929537');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '542', '569.988364');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '10', '537.31');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '15', '453.68');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '537', '415.039693');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '19', '282.45');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '534', '269.591396');


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
VALUES ('24', '543', '220.098689');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '24', '210.26');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '550', '194.11889');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '457', '167.64');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '541', '148.689189');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '37', '137.03');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '459', '134.09');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '536', '132.064713');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '460', '125.5');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '548', '101.878409');


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
VALUES ('24', '547', '62.682045');


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
VALUES ('24', '551', '17.073576');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '470', '16.12');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '555', '15.495123');


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
VALUES ('24', '539', '5.219629');


INSERT INTO list_isc21_io500 (listing_id, submission_id, score)
VALUES ('24', '206', '4.19');

-- insert the records in the full list

INSERT INTO list_isc21_full (listing_id, submission_id, score) SELECT '27', submission_id, score FROM list_sc20_full;
INSERT INTO list_isc21_full (listing_id, submission_id, score) SELECT '27', submission_id, score FROM list_isc21_io500;

-- insert the records in the historical list

INSERT INTO list_isc21_historical (listing_id, submission_id, score) SELECT '28', submission_id, score FROM list_sc20_historical;
INSERT INTO list_isc21_historical (listing_id, submission_id, score) SELECT '28', submission_id, score FROM list_isc21_io500;
