<?php
namespace bergenworks\acf\blocks;

    /**
     * Testimonial Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   string $content The block inner HTML (empty).
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Get values
    $text = get_field('testimonial') ?: 'Your testimonial here...';
    $author_name = get_field('author') ?: 'Author name';
    $author_role = get_field('role') ?: 'Author role';
    $author_img = get_field('image') ?: null;

    // Create id attribute allowing for custom "anchor" value.
    $id = "bergenworks-testimonial-" . $block["id"];
    if (!empty($block["anchor"])) {
        $id = $block["anchor"];
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $className = "testimonial";
    if (!empty($block["className"])) {
        $className .= " " . $block["className"];
    }
    if (!empty($block["align"])) {
        $className .= " align" . $block["align"];
    }
?>

<div id="<?php echo $id ?>" class="<?php echo $className ?>">
    <blockquote class="testimonial-text">
        <p><?php echo $text ?></p>
    </blockquote>

    <div class="testimonial-author">
        <?php if ($author_img) : ?>
        <img src="<?php echo $author_img["sizes"]["thumbnail"] ?>" alt="" class="testimonial-author-image">
        <?php endif; ?>

        <p class="testimonial-author-name">
            <?php echo $author_name ?>
        </p>
        <p class="testimonial-author-role">
            <?php echo $author_role ?>
        </p>
    </div>
</div>

<?php if ($is_preview) : ?>
<style>
    .testimonial {
        display: flex;
        flex-direction: row;
    }

    .testimonial-text {
        margin: 0;
        padding: 0 1rem;
    }

    .testimonial-author {
        padding: 0 1rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .testimonial-author-image {
        width: 100px;
        height: auto;
        border-radius: 50%;
        filter: grayscale(1);
        margin-bottom: 0.5rem;
    }

    .testimonial-author-name {
        margin: 0;
        font-weight: bold;
    }

    .testimonial-author-role {
        margin: 0;
    }
</style>
<?php endif; ?>
