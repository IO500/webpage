<?php $this->assign('title', 'Change Request'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('CHANGE REQUEST'), ['controller' => 'pages', 'action' => 'display', 'rules-benchmark']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>The IO500 Foundation Steering Committee Rules - Version 2.0</h2>

    <h3>Major Benchmark Change Request/Proposal</h3>

    <p>
        The IO500 aims to be a robust and long-living benchmark suite. Nevertheless, the community recognizes the need to consider occasional modifications such as including new access patterns, removing deprecated access patterns, or any other modifications deemed necessary by the community to keep the suite relevant. There are two classes of changes: Minor changes are those most similar to bug fixes or clarifications of agreed upon benchmark phases, these changes are incorporated strictly following the committee decision process. Major changes are those that would add a new phase or significantly change how a phase works. The threshold for a major change is something that would offer a statistically significant change to scoring. 
    </p>

    <p>
        To manage Major changes, we have established a process which works as follows:
    </p>

    <ol>
        <li>
            Proposals go through a multi-phase process. The state/phase names, in order, are the following: Submitted, Review and Clarification, Voting, Pilot, Incorporated. There is also a Rejected state for a proposal that is deemed inappropriate or insufficient to move through the Review and Clarification process. Phases are all independent, sequential, and do not overlap.
        </li>
        <li>
            Anyone can submit a proposal for the new access pattern. This should include the following sections at least in a basic form sufficient for discussion:

            <ol type="a">
                <li>
                    Motivation and justification why the pattern is important. For example, relevant real-world applications that have the proposed IO pattern;
                </li>
                <li>
                    A rough sketch of the access pattern and a suggested benchmark command-line and/or changes needed to existing benchmarks for its execution;
                </li>
                <li>
                    Additional information needed to evaluate the reproducibility of the new phase;
                </li>
                <li>
                    Expected runtime of the new access pattern and its impact to the overall IO500 benchmark runtime;
                </li>
                <li>
                    How to avoid submissions from intentionally or unintentionally submitting invalid results, e.g.,  client or server caching effects;
                </li>
                <li>
                    Where in the ordering of the existing benchmark phases it is proposed to be inserted and why. This should include a description of the potential impact to the other benchmark phases and how any effects are being mitigated. If it is dependent on another benchmark phase’s output, explicitly describe this including how variations in that phase affect this proposed benchmark phase.
                </li>
            </ol>
        </li>
        <li>
            Each phase’s length is left to what is needed to adequately cover the proposed idea. It is expected that sufficient details are offered for a third-party to understand what the proposed idea is, why it is a benefit to the IO500 community, how much time the new component is expected to add, and how it may ultimately be incorporated into scoring. Including “rationale” sub-sections as often as needed to clarify is encouraged.
        </li>
        <li>
            This proposal can then be sent to the community mailing list or the steering board and are accepted on an ongoing basis. Ideally, this should be in a shared, online document such that comments and questions can be attached to items and community visible for the purposes of resolving misunderstandings or vague language. Proposals that have been received are in the Submitted state.
        </li>
        <li>
            If the proposal is made by a community member that is not a board member, then the review process and discussion can either be open or closed, according to the submitter’s wishes. The default is open.
        </li>
        <li>
            If the proposal is made by a board member, the discussion can be open or closed, according to the submitter’s wishes. The default is closed.
        </li>
        <li>
            Once the proposal has begun discussion, it moves into the Review and Clarification state.
        </li>
        <li>
            The Review and Clarification state consists of discussions through document comments or other mechanisms to clarify any questions or limitations/misunderstandings to drive to clarity. Ultimately, all of this discussion must be resolved with the resulting ideas folded back into the base document. Including one or more “rationale” sub-sections to explain the intent and motivation.
        </li>
        <li>
            Once a proposal has completed discussion, it moves to a Voting state. Next is to decide whether to accept the proposal or not.
        </li>
        <li>
            The committee follows its decision process to decide the fate of a proposal in the Voting state. If the result is to approve, then it moves to the Pilot state. If it is rejected, it goes to the Rejected state terminating the process. Rejected proposals must incorporate reasoning for rejection and resubmission such that concerns are adequately addressed can be re-evaluated starting at the Submitted state.
        </li>
        <li>
            If the decision process approves the proposal, the phase moves to Pilot. Then the IO500 benchmark will be modified for the next submission period starting after the changes have been incorporated and tested. These changes are incorporated to allow the execution of a benchmark that represents the pattern as an optional benchmarking step. Additionally, the optional field is introduced into subsequent lists and the changes to the benchmark are documented on the webpage.
        </li>
        <li>
            When the proposal moves to the Pilot phase, it is published via a link on the IO500 website for the community to evaluate and comment.
        </li>
        <li>
            The optional pattern is kept for at least two subsequent IO500 lists and community meetings. The results and effectiveness of the new pattern are discussed during the community meetings (SC and ISC to ensure international representation and concerns to be heard).
        </li>
        <li>
            Based on community feedback of the new phase, the proposal may move to Incorporated marking it as an official part of the benchmark suite or to another appropriate phase according to the community feedback. As a result, it may be removed, remain optional, or may become mandatory.
        </li>
        <li>
            If the proposal moves to the Incorporated state, the final proposal is published on the website for public reference.
        </li>
    </ol>

    <p>
        The committee can be reached at <a href="mailto:committee@io500.org" class="link">committee@io500.org</a>.
    </p>
</div>
