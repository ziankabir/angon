<?php if (isset($error) AND ! empty($error)): ?>
    <p style="background-color: #DD4B39;color: white; padding: 4px 4px 2px 4px;font-size: 12px;position: relative;text-align: center;">
        <?php echo $error; ?>
    </p>
<?php endif; ?>
<?php if (isset($information) AND ! empty($information)): ?>
    <p style="background-color: #00C0EF;color: white; padding: 4px 4px 2px 4px;font-size: 12px;position: relative;text-align: center;">
        <?php echo $information; ?>
    </p>
<?php endif; ?>
<?php if (isset($warning) AND ! empty($warning)): ?>
    <p style="background-color: #F39C12;color: white; padding: 4px 4px 2px 4px;font-size: 12px;position: relative;text-align: center;">
        <?php echo $warning; ?>
    </p>
<?php endif; ?>
<?php if (isset($success) AND ! empty($success)): ?>
    <p style="background-color: #00A65A;color: white; padding: 4px 4px 2px 4px;font-size: 12px;position: relative;text-align: center;">
        <?php echo $success; ?>
    </p>
<?php endif; ?>
