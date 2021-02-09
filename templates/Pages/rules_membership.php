<?php $this->assign('title', 'Membership'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('MEMBERSHIP'), ['controller' => 'pages', 'action' => 'display', 'rules-membership']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h3>IO500 Committee Membership and Succession Rules v1.0</h3>

    <p>
        The <?php echo $this->Html->link('IO500 committee', ['controller' => 'pages', 'action' => 'display', 'steering'], ['class' => 'link']); ?> is a standards body operating with consensus on all decisions excepting times noted in the committee rules. As such, the work progresses slowly with much deliberation. At times, the committee makeup may change. The following describes the committee makeup and how that form changes over time.
    </p>

    <ol>
        <li>
            The founding members, John Bent, Julian Kunkel, and Jay Lofstead are the only committee members ever to use the additional qualifier of "co-founder". Everyone else is solely a "co-organizer".
        </li>
        <li>
            The committee size may shrink based on a resignation leaving the remaining permanent committee members the exclusive choice of who will fill the role for the new committee member slot.
        </li>
        <li>
            If a committee member wishes to resign at a future date, they can overlap a potential committee member replacement for 1 list cycle (SC to ISC or ISC to SC). Once the list is finalized for that event, the resigning committee member’s time is completed or the potential committee member may choose to not continue. Both may choose to leave at the same time leaving the remaining committee to fill the empty slot(s).
        </li>
        <li>
            All committee members must confirm that their role must be treated separately from their responsibilities to their employers and must not lead to a conflict of interest. Some information discussed by the committee will be considered confidential to the board and cannot be shared outside of the committee. Members must confirm this separation of roles in good conscience. If any committee member detects that their employer wishes to abuse their position in the IO500 committee, they must report this immediately to the rest of the committee.
        </li>
        <li>
            There are three types of committee member roles:
        </li>
        <ul>
            <li>
                <strong>Permanent</strong> &mdash; a committee member that is not in the process of resigning and has been confirmed after a potential 1 cycle trial period.
            </li>
            <li>
                <strong>Resigning</strong> &mdash; a committee member that is overlapping with a potential replacement to help guide the new committee member.
            </li>
            <li>
                <strong>Trial</strong> &mdash; a committee member that is in a 1 cycle trial period. New committee members need not undergo a trial period at the unanimous consent of the permanent committee members.
            </li>
        </ul>
        <li>
            Committee members have no fixed term limits. Instead, a permanent committee member is free to participate as long as they feel like they have time and can work to support the IO500 efforts.
        </li>
        <li>
            Should the committee size temporarily increase, the consensus requirements are not weakened. Instead, all committee members (permanent, resigning, and trial) must still agree unanimously for efforts to move forward.
        </li>
        <li>
            On a unanimous vote of the permanent committee members, the size of the committee can be adjusted. Any additions to the committee or changes from trial to permanent require unanimous consent.
        </li>
        <li>
            A call for nomination requires the unanimous consent of the committee.
        </li>
    </ol>

    <p>
        <strong>Process:</strong> Once a new committee member has been nominated, the committee will contact that person to confirm their willingness to proceed with nomination evaluation. At the expiration of the nomination period, including any granted deadline extensions, the committee has 2 weeks to make a decision about which nominee, if any, should be selected. Once selected, the committee will notify the candidate informing them of the selection and requesting confirmation of their selection. If the selection is declined, the committee will proceed to select another nominee or choose to not select a nominee based on unanimous consent of the permanent members. Once a nominee has been selected and confirmed as a new committee member, other nominees will be notified by the public announcement of the new committee member of the selected candidate. If no candidate is selected, nominees will be notified that no selection was made without further explanation.
    </p>

    <h3>New Committee Member Qualifications</h3>

    <p>
        An open, worldwide call for submissions for committee membership should be announced with a 21-day window for submissions.
    </p>

    <ul>
        <li>
            Submissions are to be sent to the <a href="mailto:committee@io500.org"><span class="code">committee@io500.org</span></a> email address.
        </li>
        <li>
            Anyone can either self-nominate or be nominated by others.
        </li>
        <li>
            Nominees must have participated in the IO500 community
        </li>
        <li>
            Qualified nominees meet the following technical criteria:
        </li>
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
    </ul>

    <p>
        To ensure the broadest global support for IO500 and to ensure diverse opinions, preference will be given to qualified nominations that address the following:
    </p>

    <ul>
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

    <div id="disqus_thread"></div>
</div>

<script>
var disqus_config = function () {
    this.page.url = "<?php echo $this->Url->build($this->request->getRequestTarget(), ['fullBase' => true]); ?>";
    this.page.identifier = "<?php echo $this->Url->build($this->request->getRequestTarget()); ?>";
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://io500.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
