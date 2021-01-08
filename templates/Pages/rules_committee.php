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
    <h3>Committee</h3>

    <p>
        The IO500 Committee, as of October 2020, consists of the three founding members (in alphabetical order), John Bent, Julian Kunkel, and Jay Lofstead, as well as two additional members, Andreas Dilger and George Markomanolis, who were a active early community participants and joined the committee subsequently.
    </p>

    <p>
        The committee governs itself with the following rules:
    </p>

    <ol>
        <li>
            All changes to the benchmarking scripts or methodology require all committee members to review and approve.
        </li>
        <li>
            Changes to the website are performed via GitHub pull requests and require consent among all committee members.
        </li>
        <ul>
            <li>
                Core parts (such as rules) must be unanimously approved.
            </li>
            <li>
                Other changes just require one additional committee member and one web reviewer to approve the pull request. However, in case a committee member has concerns of any change made, it will be reverted/updated.
            </li>
        </ul>
        <li>
            By default, all submissions marked <span class="code">VALID</span> by the <span class="code">io500.sh</span> script are accepted. However, any committee member can raise an objection if they think a submission violates any of the IO500 rules. In typical situations, the committee will discuss the concerns with the submitter. After this discussion, the committee will vote. If 50% or more think the submission should be rejected, it will be rejected.
        </li>
        <li>
            All requests for media interviews are discussed by the full committee who most unanimously decide how to respond.
        </li>
        <li>
            There are two official channels of communication for the IO500: the Twitter handle and the email address <a href="mailto:committee@io500.org">committee@io500.org</a>. The only mechanism for communicating official IO500 announcements, policies, statements, or decisions is via the email address (hereafter referred to as The Email Address). All communication from The Email Address must be unanimously pre-approved by the full committee. Official communication will also be echoed to the twitter handle.
        </li>
        <ul>
            <li>
                The Twitter handle can be used without pre-approval to advertise IO500 and to rebroadcast any official statements issued from The Email Address. Retweets of news reports including IO500 and other IO500 mentions do not require committee approval.
            </li>
            <li>
                All private conversations between community members and committee members must be reported back to the committee with the only exception being requests for clarification of existing published information (this includes technical information available on GitHub).
            </li>
            <li>
                Any and all communications from individual committee members are merely expressions of their personal opinion and represent neither official positions nor opinions of the IO500. When committee members reply as individuals to questions asked about official IO500 policies, they must include the following statement, <em>"These statements merely reflect my own personal view; the only mechanism for announcing official IO500 policies and decisions is the committee@io500.org email address."</em> This covers face-to-face conversations, conversations in slack, social media such as LinkedIn and Facebook, and all other communication methods not explicitly mentioned elsewhere in these rules.
            </li>
            <li>
                Community members can ask individual committee members for clarification about existing policies. However, if the question has not yet been publicly answered, then the committee member must bring the question to the full committee and the answer must be issued from The Email Address and twitter in accordance with these rules.
            </li>
            <li>
                These rules apply to the benchmark applications used in the IO500 when the context is IO500 related but do not apply to general conversations about IO unrelated to IO500.
            </li>
        </ul>
        <li>
            All lists of names should follow alphabetical order.
        </li>
        <ul>
            <li>
                For casual material, first name ordering is fine;
            </li>
            <li>
                For official purposes, last name ordering should be used;
            </li>
            <li>
                Bibtex, any documentation about the list or the benchmarks should use {author: IO500 Committee; editors: alpha names by last};
            </li>
            <li>
                For academic publishing (e.g., analysis of the list), name order should follow contribution effort. If equal contributions, then follow the other rules.
            </li>
        </ul>
    </ol>

    <p>
        The committee can be reached at <a href="mailto:committee@io500.org"><span class="code">committee@io500.org</span></a>.
    </p>

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
