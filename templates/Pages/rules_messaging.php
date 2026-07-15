<?php $this->assign('title', 'Messaging Policy'); ?>

<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('HOME'), ['controller' => 'submissions', 'action' => 'latest']);
    $this->Breadcrumbs->add(__('RULES'), ['controller' => 'pages', 'action' => 'display', 'rules']);
    $this->Breadcrumbs->add(__('MESSAGING POLICY'), ['controller' => 'pages', 'action' => 'display', 'rules-messaging']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="content">
    <h2>The IO500 Foundation Steering Committee Rules - Version 2.0</h2>

    <h3>Messaging Policy</h3>

    <p>
        The IO500 community serves as a central hub to gather, share, and amplify the full range of high-performance storage systems across production and research environments. While we celebrate the top-ranked awards for each list, we believe every submission offers valuable insights that educate and benefit the global storage community.
    </p>

    <p>
        These guidelines ensure that technical achievements are represented accurately and are not misused, misconstrued, or co-opted. Our goal is to maintain a level playing field—both in benchmark execution and in the honest representation of results.
    </p>

    <h4>Verified and Unverified Results</h4>

    <p>
        If a submission is officially listed on a published IO500 List, then mention of the IO500 benchmark result must be listed as “verified”. A “verified” submission has been audited by the committee for correctness of the whole submission package. This includes reviewing the documentation provided by the submitter for correctness, feasibility, and consistency. The term verified must be prominently displayed in the same paragraph as the first mention of the IO500 result.
    </p>

    <p>
        If an IO500 benchmark result is not on any IO500 list, and therefore has not been verified by the IO500 committee, the result must be stated as being “unverified”. Further, if the execution of the benchmark deviated from the official execution instructions (e.g., reordering or exclusion of phases, modifying code in parts of the benchmark that aren’t allowed, execution time) then these changes must be included with the public statement.
    </p>

    <p>
        Note that the inclusion of the terms “verified” or “unverified” are only required in public statements. This includes blogs, websites, papers, chatrooms, social media, talks, etc. This does not cover mentioning IO500 results within a classroom or other research setting. For example, researchers are encouraged to run IO500 in a variety of novel and innovative configurations, and these comparisons (all of which are unverified), are not required to be listed as such.
    </p>

    <h4>Standards for Using IO500 Results</h4>

    <p>
        To maintain the integrity of the IO500 lists and results, all participants must adhere to the following rules when referencing verified or unverified results:
    </p>

    <ul>
        <li>
            <b>Specify the List Instance:</b> Any mention of a result must explicitly state the list on which the submission exists (e.g., Production List, Research List) and the specific Birds of a Feather (BoF) session from which the list was derived (e.g., SC25).
        </li>
        <li>
            <b>Actual Ranking Position:</b> When specifying a ranking, you must provide the precise rank for the metric that was published. If an entry is ranked #5 based on overall score on the Production list, it must be cited as "#5 on the Production list at SC25."
        </li>
        <li>
            <b>Published Metrics Only:</b> When creating custom comparisons, you may only use existing columns published by the IO500 (or values derived from these columns). You cannot invent metrics if that data point is not a standard IO500 column.
        </li>
        <li>
            <b>No Inter-List Comparisons:</b> Comparisons must be made within a single metric on a specific list. Comparing a bandwidth score from the Research List against one from the Production List is prohibited, since the criteria for placement in the two lists is different.
        </li>
        <li>
            <b>IO500 Neutrality:</b> Do not imply that the IO500 endorses or supports any specific company, system, or submitter.
        </li>
        <li>
            <b>Specify Unverified Results Changes to Benchmark (if any):</b> In publishing an unverified result, all changes to the execution of the IO500 benchmark must be specified. This includes but is not limited to skipping or re-ordering of phases, changes to phase runtimes, IOR/mdtest code changes, io500 code changes, etc.
        </li>
        <li>
            <b>Governance:</b> The IO500 Steering Committee reserves the right to object to any use of IO500 data or results that it deems inappropriate.
        </li>
    </ul>

    <h4>IO500 Result Usage Examples</h4>

    <p>
        Examples of acceptable language include:
    </p>

    <ul>
        <li>
            “These results are unverified by IO500 Foundation”
            <ul>
                <li>This assumes all the other required details were included in the statement as well.</li>
            </ul>
        </li>
        <li>
            "&lt;Company&gt; achieved a verified placement of the top IBM Storage Scale entry on the Production list at SC22"
            <ul>
                <li>This assumes that the system in question actually did achieve the highest-ranked entry for that file system type.</li>
            </ul>
        </li>
        <li>
            "&lt;Company&gt; achieved the #1 verified bandwidth score on the Research list at ISC25."
        </li>
        <li>
            &lt;Company&gt; achieved an unverified IO500 bandwidth score that would have achieved 3rd place on the ISC25 Production List.
        </li>
        <li>
            We measured the ISC25 edition IO500 benchmarks on product X for testing and achieved an unverified overall score of Y.
        </li>
    </ul>

    <p>
        Examples of inacceptable language:
    </p>

    <ul>
        <li>
            “Running the IO500 on product X, we achieved a score better than rank 1 of the IO500.”
            <ul>
                <li>
                    This is unacceptable because:
                    <ul>
                        <li>Lacks unverified statement</li>
                        <li>Does not state which IO500 list (and hence benchmark edition) they are referring to</li>
                        <li>Does not indicate whether they are referring to the overall score, bw score, or metadata score</li>
                        <li>Did not specify changes made to benchmark (if there were any)</li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            “#1 against our primary competitors"
            <ul>
                <li>
                    This is unacceptable because:
                    <ul>
                        <li>‘primary competitors’ is not an IO500 metric</li>
                        <li>Not listed as verified or unverified</li>
                        <li>Does not state which IO500 list they are referring to</li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>

    <h4>Addressing Violations</h4>

    <p>
        If the IO500 Steering Committee identifies a violation of these guidelines, the following enforcement process will be initiated:
    </p>

    <ul>
        <li>
            <b>Direct Outreach:</b> The Committee will contact the responsible party to explain the problematic statement and request a correction (see below).
        </li>
        <li>
            <b>Escalated Action:</b> If the party is unresponsive or unwilling to rectify the issue, the Committee may take further action, including but not limited to the following, in order of increasing severity:
            <ul>
                <li>
                    <b>Public Notice:</b> Issuing a formal statement on the IO500 website and social media channels.
                </li>
                <li>
                    <b>Submission Removal:</b> Removing the relevant entries from the IO500 lists on which they appear.
                </li>
                <li>
                    <b>Organizational Sanctions:</b> Removing all submissions from the associated organization from the IO500.
                </li>
                <li>
                    <b>Submission Ban:</b> Banning the submitter or organization from making new submissions for a set period (e.g., one year) or indefinitely.
                </li>
            </ul>
        </li>
    </ul>

    <h4>Acceptable Corrective Action</h4>

    <p>
        To resolve a problematic action that violates the messaging policy, the institution or person must correct the statement directly where it occurred. This would mean that wherever the infraction occurred (e.g., blog, advertising website, news article, vendor webpage) the actual language must be directly edited to meet the messaging policy. This applies equally to posts on social media, where the post would either need to be edited or removed.
    </p>

    <p>
        Examples of unacceptable resolutions include:
    </p>

    <ul>
        <li>A small footnote or indication on a website indicating the change (instead of editing the text directly)</li>
        <li>Another post on social media correcting the original post (since the original post was not altered or removed)</li>
    </ul>

    <h4>Changes to This Policy</h4>

    <p>
        The IO500 reserves the right to update this policy periodically. If significant changes are made, we will notify the community via a prominent notice on our primary communication channels.
    </p>
</div>
