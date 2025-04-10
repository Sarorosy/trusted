<div class="container mt-4">
    <div class="row mx-auto justify-content-center">
        <!-- Main Content -->
        <div class="col-lg-6">

            <img src="<?= base_url('uploads/' . $blog->image) ?>" class="img-fluid mb-3" alt="<?= htmlspecialchars($blog->title) ?>">

            <h1 class="mb-3">
                <?php
                if (!empty($blog->pay)) {
                    echo htmlspecialchars($blog->pay) . ' ' . htmlspecialchars($blog->title);
                } else {
                    echo htmlspecialchars($blog->title);
                }
                ?>
            </h1>

            <p class="category-label">
                <?= htmlspecialchars($blog->category_name) ?>
                <span class="date"><?= date("M d, Y", strtotime($blog->created_at)) ?></span>
            </p>



            <div class="mb-4">
                <h4>Description</h4>
                <?php $content = explode('</p>', $blog->description, 2); ?>
                <?= isset($content[0]) ? $content[0] . '</p>' : ''; ?>

                <?php if (!empty($blog->keywords)): ?>
                    <?php $ads = json_decode($blog->keywords, true); ?>
                    <?php if (!empty($ads)): ?>
                        <div class="mt-4">
                            <h4>Sponsored Links</h4>
                            <div class="row row-cols-2 g-3">
                                <?php foreach ($ads as $ad): ?>
                                    <div class="col">
                                        <a href="<?= htmlspecialchars($ad['link']) ?>" target="_blank" class="sponsored-link">
                                            <div class="card shadow-sm border-0 p-3 sponsored-div">
                                                <h6 class="card-title mb-0"><?= htmlspecialchars($ad['title']) ?> <span class="arrow">&gt;</span></h6>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>


                <?= isset($content[1]) ? '<p>' . $content[1] : ''; ?>
            </div>
        </div>

        <!-- Sidebar (Popular Content) -->
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 0;">
                <h4 class="mb-3">Popular</h4>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none">Streamlining Your Life: The Role of Home Appliances in Modern Living</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none">From Vision to Victory: Achieving Business Goals with Marketing Services</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none">Want $2000 Free? Here’s How Opening the Right Bank Account Can Make It Happen!</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none">Why Pay for a Bathroom Remodel? Discover Grants That Cover It All in the USA!</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none">Instant Approval Business Grants: The USA’s Best-Kept Secret for Entrepreneurs</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>