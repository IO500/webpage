<?php $this->assign('title', 'Committee'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('COMMITTEE'), ['controller' => 'pages', 'action' => 'display', 'rules-committee']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>The IO500 Foundation Steering Committee Rules - Version 2.0</h2>

    <h3>Committee Size and Members</h3>

    <p>
        The committee size will vary based on a member’s ability to participate and contribute as well as desire to incorporate additional members. There are two classifications of committee members: Founders and Organizers.
    </p>

    <h4>Founders</h4>

    <p>
        The founders classification is limited to the three founding members: John Bent, Julian Kunkel, and Jay Lofstead. These people are entitled to use “co-founder” when describing their affiliation with the organization.
    </p>

    <h4>Organizers</h4>

    <p>
        All committee members are considered a co-organizer and entitled to voting rights. Sub-committee members are not considered committee members and therefore not entitled to a vote unless they are also a committee member independently. The public designation is a co-organizer.
    </p>

    <p>
        Key information related to access to hosting and online service administrator/owner logins and related services are limited to and open to all committee members. Sub committee members will be granted access to information and resources on a need to know basis.
    </p>

    <p>
        All committee members must confirm that their role must be treated separately from their responsibilities to their employers and must not lead to a conflict of interest. Some information discussed by the committee will be considered confidential to the committee and cannot be shared outside of the committee. Members must confirm this separation of roles in good conscience. If any committee member detects that their employer wishes to abuse their position in the IO500 committee, they must report this immediately to the rest of the committee.
    </p>

    <p>
        Committee members have no fixed term limits. Instead, a committee member is free to participate as long as they feel like they have time and can work to support the IO500 efforts. As with all roles in IO500, committee and subcommittee roles are all unpaid, but considered volunteer time for the non-profit. Committee members are free to document this time for tax purposes. Should they do this, the documentation must be shared with the IO500 Foundation in case of tax audit.
    </p>

    <h4>Former Committee Members</h4>

    <p>
        People who were once committee members, but are no longer part of the committee can list themselves as “former” or “emeritus” or some other designation to show the previous affiliation and guidance role while acknowledging that they are not an active part of steering the organization anymore.
    </p>
</div>
