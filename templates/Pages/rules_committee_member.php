<?php $this->assign('title', 'Committee'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('COMMITTEE MEMBER'), ['controller' => 'pages', 'action' => 'display', 'rules-committee-member']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>The IO500 Foundation Steering Committee Rules - Version 2.0</h2>

    <h3>New Committee Member Process</h3>

    <p>
        Should an open call be made for a new committee member, the following process described in this section is recommended. This process may be adjusted prior to the call being made. Based on service to the committee via a sub-committee, a sub-committee member can be promoted directly to be a full committee member following the decision process rules.
    </p>

    <p>
        For all new committee members, once they are nominated, the committee will contact that person to confirm their willingness to proceed with nomination evaluation. At the expiration of the nomination period, including any granted deadline extensions, the committee has 2 weeks to make a decision about which nominee, if any, should be selected. Once selected, the committee will notify the candidate informing them of the selection and requesting confirmation of their selection. If the selection is declined, the committee will proceed to select another nominee or choose to not select a nominee based on the decision process. Once a nominee has been selected and confirmed as a new committee member, other nominees will be notified by the public announcement of the new committee member of the selected candidate. If no candidate is selected, nominees will be notified that no selection was made without further explanation.
    </p>

    <h4>New Committee Member Qualifications</h4>

    <p>
        An open, worldwide call for submissions for committee membership should be announced with a 21-day nomination period for submissions.
    </p>

    <ul>
        <li>
            Submissions are to be sent to the <a href="mailto:committee@io500.org" class="link">committee@io500.org</a> email address.
        </li>
        <li>
            Anyone can either self-nominate or be nominated by others.
        </li>
        <li>
            Nominees must have participated in the IO500 community.
        </li>
        <li>
            Qualified nominees meet the following technical criteria:

            <ul>
                <li>
                    Publications at well-respected venues related to storage and IO within the HPC community within the last 5 years.
                </li>
                <li>
                    Enterprise and scale-out focused storage venues may also qualify at the discretion of the permanent committee members.
                </li>
                <li>
                    Demonstrable basic knowledge of how IOR, MDTEST, and the find phase work for the benchmark. This list will be changed as the benchmark evolves reflecting the current tool suite.
                </li>
                <li>
                    Ability to attend a video conference 2-3 times per month (but scheduled weekly with expected cancellations) with a 4-6 hours per month total time commitment. Additional time will be required around the SC and ISC events to qualify entries and organize the SC and ISC events. Other special projects may require additional time as well.
                </li>
                <li>
                    Ability to attend most SC and ISC events to present without financial support from IO500.
                </li>
                <li>
                    Desire to grow support and trust in IO500 as a standard approach for comparing and understanding scale-up storage systems.
                </li>
            </ul>
        </li>
    </ul>

    <p>
        To ensure the broadest global support for IO500 and to ensure diverse opinions, preference will be given to qualified nominations that address the following:
    </p>

    <ul type="a">
        <li>
            The additional global region represented (North America, South America, Europe, Asia, Australia, Middle East/North Africa, Sub-Saharan Africa);
        </li>
        <li>
            Gender representation improvement;
        </li>
        <li>
            Racial representation improvement.
        </li>
    </ul>
</div>
