<?php $categories = $this->getCategories(); ?>
    <div class="main">
        <table class="table caption-top">
            <thead class="table-dark">
                <tr>
                    <th>Category Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$categories) { ?>
                <tr>
                    <td>No result Found</td>
                </tr>
                <?php } else {
                    foreach ($categories->getData() as $key => $category) :
                        ?>
                <tr>
                    <td><?php echo $category->name;?></td>
                    <td><?php echo $category->description;?></td>
                </tr>
                <?php        
                endforeach;
            }
            ?>
            </tbody>
        </table>
    </div>
