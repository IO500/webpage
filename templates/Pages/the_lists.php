<?php $this->assign('title', 'The Lists'); ?>

<div class="content">
    <h2>The Lists</h2>

    <p>
        We publish multiple lists for each BoF at SC and ISC as well as maintaining the current most up-to-date lists. 
        We intend to not modify a list after the release date but in exceptional circumstances. However, we allow to improve and clarify list metadata upon the request of the submitters.
        We publish a <strong>Historic List</strong> of all submissions received and multiple filtered lists from the historic list. We maintain a <strong>Full List</strong> which is the subset of submissions which were valid according to the set of list-specific rules in place at the time of the list’s publication.
    </p>

    <p>
        Our primary lists are <strong>Ranked Lists</strong> which show only opted-in submissions from the <strong>Full List</strong> and only the best submission per storage system. We have two ranked lists: the <strong>IO500 List</strong> for submissions which ran on any number of client nodes and the <strong>10 Node Challenge</strong> list for only those submissions which ran on exactly ten client nodes.
    </p>

    <p>
        In summary, each BoF has the following lists:
    </p>

    <ul>
        <li>
            <strong class="link">Historic List</strong>: ranking of all submissions ever received
        </li>
        <li>
            <strong class="link">Full List</strong>: subset of the Historic list of submissions that satisfy the existing IO500 submission guidelines
        </li>
        <li>
            <strong class="link">Research List</strong>: ranking of the research system submissions. This is a subset of the Full List of submissions, showing only one highest-scoring result per storage system.  This list also contains all valid IO500 submissions prior to the creation of the Research List.
        </li>
        <li>
            <strong class="link">Production List</strong>: ranking of production system submissions. This is a subset of the Full List of submissions, showing only one highest-scoring result per storage system. Submitters who want a submission that is currently on the Research List to be on the Production List should contact the IO500 Steering Committee.
        </li>
        <li>
            <strong class="link">10 Client-node Research List</strong>: ranking of the research system submissions that used exactly ten client nodes. This is a subset of the Full List of submissions, showing only one highest-scoring result per storage system. This list also contains all valid IO500 10 client node submissions prior to the creation of the Research List.
        </li>
        <li>
            <strong class="link">10 Client-node Production List</strong>: ranking of the research system submissions that used exactly ten client nodes. This is a subset of the Full List of submissions, showing only one highest-scoring result per storage system. Submitters who want a submission that is currently on the 10 client node Research List to be on the 10 client node Production List should contact the IO500 Steering Committee.
        </li>
    </ul>
    
    <p>
        Please note that the Ranked Lists only show the best submission for each storage systems, so if a storage system has multiple submissions only the one with the <strong>highest overall score</strong> is shown in the Ranked Lists.  All submissions will appear in the Full and Historical lists.
    </p>

    <h3>Awards</h3>

    <p>
        There are 12 awards. We will have one each for overall score, metadata only, and bandwidth only for each of the Production and Research lists and their 10-client counterparts.
    </p>        

    <h3 id="production-list">Production List Overview</h3>

    <p>
        To be eligible for the Production List, a submission must meet the definition of a “Production System”. The spirit of the Production System definition below is to ensure entries on the Production List are systems that are used by scientists, quants, security teams, data scientists over an extended period of time. Often this means the cluster has a batch scheduler and queues up incoming Production Application execution requests.  It also further means that the duration of deployment is much longer than a few days, weeks or months…and is typically measured in years.
    </p>

    <p>
        A “Production System” is an IO500 submission that:
    </p>

    <ul>
        <li>consists of a <strong>Compute System</strong> and <strong>Storage System</strong> that on a '<strong>regular</strong>', '<strong>frequent</strong>', and '<strong>ongoing</strong>' basis executes <strong>Production Applications</strong> that generate <strong>Production Data</strong></li>
        <li>achieves the highest <strong>Reproducibility Score</strong></li>
        <li>has no <strong>single point of failure</strong> in its <strong>Storage System</strong></li>
    </ul>

    <p>
        Where the terms mentioned are defined as follows:
    </p>

    <p>
        <strong class="link">Definition 1:</strong> <strong>Storage System</strong> - The set of nodes and storage devices used by <strong>Production Applications</strong> to store <strong>Production Data</strong> and against which the IO500 benchmark suite is executed.
    </p>

    <p>
        <strong class="link">Definition 2:</strong> <strong>Compute System</strong> - The set of nodes that execute <strong>Production Applications</strong> and execute the IO500 benchmark. These nodes may overlap with those utilized by the storage system.
    </p>

    <p>
        <strong class="link">Definition 3</strong>: <strong>Production Application</strong> - An application that is executed on the <strong>Compute System</strong> during normal operation.  This application <strong>MUST</strong> solve specific scientific or business problems and <strong class="link">CANNOT</strong> be benchmarks, storage system software, or any other application whose purpose is purely motivated by computer science questions.  Note that a build farm would count as a production application since it is using production data (i.e., code).
    </p>

    <p>
        <strong class="link">Definition 4</strong>: <strong>Production Data</strong> - The data stored in the Storage System during normal operation that is read by written by <strong>Production Applications</strong>.  This data <strong>MUST</strong> have scientific and/or business value and <strong class="link">CANNOT</strong> be a well-defined pattern (e.g., 0s, 1s, repeated hash) or algorithmically generated (e.g., random, a function without scientific/business value).  
    </p>

    <p>
        <strong class="link">Definition 5</strong>: <strong>System Metadata</strong> - Any information tracked or stored regarding application or storage system execution. The point of defining <strong>System Metadata</strong> is to clarify that it is completely separate and not included as a type of <strong>Production Data</strong> since it is not directly generated by the <strong>Production Applications</strong>, but rather a set of information about the system and its behavior. Examples of <strong>System Metadata</strong> include data provenance, indexes, logs (from applications like Splunk, the <strong>Production Application</strong>, or the <strong>Compute System</strong> or <strong>Storage System</strong>), performance/operational metrics, etc.
    </p>

    <p>
        <strong class="link">Definition 6</strong>: <strong>Reproducibility Score</strong> - Quantifies the level of reproducibility of a submission. It is assigned by the IO500 Steering Committee to all IO500 submissions based upon the amount of information provided to enable others to reproduce the IO500 result. This information includes system metadata (e.g., number of compute nodes, storage device information), storage system configuration (e.g., RAID encoding, tuning parameters, find script) and answers to the reproducibility questionnaire on the details of how the benchmark was executed.  For more information on the reproducibility score, please see the document, <a href="/files/io500-reproducibility-proposal.pdf">"IO500 Submission Transparency and Reproducibility Proposal"</a>.
    </p>

    <p>
        <strong class="link">Definition 7</strong>: <strong>Single Point of Failure</strong> - The <strong>Storage System</strong> must be able to withstand any single failure of any component in its architecture. Upon a failure, while some amount of delay (on order of single digit minutes) is acceptable for the <strong>Storage System</strong> to recover and become consistent, applications must not be disrupted and there must be no manual intervention. For example, a failure of a storage device, storage server, switch, network cable while executing the IO500 benchmark would in no way disrupt the execution of the benchmark, which would be able to finish successfully (with most likely a lower score than if the failure had not occurred). This means that the storage system must continue operating without manual intervention upon the failure of any single storage device, server, NIC, etc. It is important to call out though that the failure of an entire rack via the top of rack switch would not be considered a single point of failure since it causes the failure of multiple storage servers. Note that this does not apply to the compute nodes on which the file system clients are deployed.
    </p>

    <p>
        It is worth clarifying a few terms in the definition of a <i>Production System</i>:
    </p>

    <ul>
        <li>
            <strong class="link">regular</strong> - The system is (or will be) in place over an extended period of time and frequent large unexplainable gaps (e.g., days or longer) between the execution of <strong>Production Applications</strong> is unacceptable. A system that executed a few production applications last week and is planning to run more next week would not be a <strong>Production System</strong>. Note that maintenance periods during which production runs are paused are expected.
        </li>
        <li>
            <strong class="link">frequent</strong> -  <strong>Production Applications</strong> are continuously executed on the system, often using an automated scheduler and set of queues to stage the incoming application execution requests. Put another way, <strong>Production Applications</strong> must consume the vast majority of aggregate computational time on the compute system. This could include a few large and long running production application jobs, many smaller and short-lived production application jobs, or anything in between. 
        </li>
        <li>
            <strong class="link">ongoing</strong> - The system is (or will be) executing <strong>Production Applications</strong> for the foreseeable lifetime of the machine.  One time executions or short execution bursts would not qualify a system as production.
        </li>
    </ul>

    <p>
        The definition of <strong>Production System</strong> above includes cloud systems, but there are several critical differences of note:
    </p>

    <ol>
        <li>
            The <strong>Compute System</strong> may be extremely dynamic, growing from 1 node to 1000s of nodes in minutes.  This doesn’t change our assessment, as long as those same types of compute nodes are executing <strong>Production Applications</strong>.
        </li>
        <li>
            The <strong>Storage System</strong> may dynamically grow and shrink, and may even be shut down for short periods of time. The <strong>Storage System</strong> used in the submission does not need to be the identical cloud deployment used to execute <strong>Production Applications</strong>, but its configuration must accurately represent the deployment configuration (e.g., VMs, storage, load-balancers) and size or shape of the storage system that has been or is currently used to execute <strong>Production Applications</strong>. For example, if a storage system reached 1PB with 32 storage server VMs while executing <strong>Production Applications</strong>, then the submitted Storage System could not be larger than 1PB, use more than 32 storage server VMs, or change the storage server VM/storage configuration.
        </li>
        <li>
            Many HPC cloud deployments are for burst use cases, where the <strong>Production System</strong> will vary in size and shape depending on the required compute/storage resources to augment the on-premise system. This continues to fit the above definition since Burst is not a one time activity of running <strong>Production Applications</strong> but rather a continuous activity that is by its very nature bursty.
        </li>
        <li>
            To obtain the highest <strong>Reproducibility Score</strong>, any cloud-based submission must list all of the specific cloud vendor’s compute/storage/networking offerings utilized so that anyone from the community could reproduce the IO500 results exactly assuming they could obtain the exact same storage system software.
        </li>
        <li>        
            The Institution in the IO500 submission must be the institution that is running the <strong>Production Applications</strong>, and not a cloud, storage, or any other type of vendor. Vendors may support the submission of an institution or, with their consent, submit on their behalf.
        </li>
    </ol>

    <p>
        For burst buffers to be considered a <strong>Production System</strong>, they must also meet the requirements listed above on failure, reproducibility, and that it is used in a <strong>'regular'</strong>, <strong>'frequent'</strong>, and <strong>'ongoing'</strong> basis for <strong>Production Applications</strong> that generate <strong>Production Data</strong>. For example, let's take a compute system that executes <strong>Production Applications</strong> with a Lustre-based storage system, but it's compute nodes also include NVMe devices for which a software storage layer exists that enables the execution of the IO500 benchmarks against these compute node NVMe devices.  Even if this software layer meets the reproducibility and failure requirements for the <strong>Production List</strong>, if this layer is not used by the majority of <strong>Production Applications</strong>, any submission using this storage software layer would not be eligible for the <strong>Production List</strong> (but a submission with the Lustre file system may be eligible for the <strong>Production List</strong>).
    </p>

    <h3 id="reproducibility-scores">Reproducibility Overview</h3>

    <p>
        Based on the amount and quality of the information provided, each submission is assigned a score that will be published on the iO500 webpage. Submissions will be encouraged to submit their target score, so that the committee can clarify any discrepancies prior to publication.
    </p>

    <p>
        The initial scoring system will have these levels:
    </p>

    <ul>
        <li>
            <strong class="link">Undefined</strong> - This is the lowest level and has missing or limited system metadata regarding the clients and/or servers and has a missing or incomplete only client metadata, but nothing about the server.
        </li>
        <li>
            <strong class="link">Limited</strong> - This represents the typical system on the IO500 list as of SC21, where much of the client and server system metadata has been provided (although this will be expanded as part of this proposal) but the questionnaire provides insufficient level of information or is missing.
        </li>
        <li>
            <strong class="link">Proprietary</strong> - This represents submissions that provide all the required metadata and a detailed questionnaire, but the submitted system is not open-source or commercially available.
        </li>
        <li>
            <strong class="link">Fully Reproducible</strong> - The highest level. This represents submissions that provide all the required metadata, a detailed questionnaire, and the system is widely available to anyone without restrictions imposed by the provider.  Software availability is typically via open-souce, a free download, or via a commercial license. Hardware is commercially available or the hardware design has been open-sourced or externally published.
        </li>
    </ul>

    <p>
        You can check out the <a href="https://www.submission.io500.org/questionnaires/sample" target="_blank" class="link">sample reproducibility questionnaire</a> while preparing your submission.
    </p>

    <h3>Further Reading</h3>

    <p>
        For further details, please see both the <a href="/files/io500-reproducibility-proposal.pdf">IO500 Reproducibility Proposal</a> and <a href="/files/io500-list-split-proposal.pdf">List Split Proposal</a>.
    </p>
</div>
