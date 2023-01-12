<div class="row">
    <aside class="column">
        <div class="side-nav">
           </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?php echo $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('forget password') ?></legend>
                <?php
               
                echo $this->Form->control('email');
              
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>