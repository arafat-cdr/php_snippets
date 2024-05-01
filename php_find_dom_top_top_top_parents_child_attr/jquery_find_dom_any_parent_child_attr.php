<script type="text/javascript">
    jQuery(document).ready(function($) {

        $('.plugin-action-buttons li:first-child').after('<li> <a href="#" class="button my_plugin_manager_plugin_ins_btn"> Save to My Plugin Manager </a></li>');

        $(document).on('click', '.my_plugin_manager_plugin_ins_btn', function(){

               // Find the top parent with class "plugin-card"
              var $pluginCard = $(this).closest('.plugin-card');

              // Get all class names of the top parent
              var classNames = $pluginCard.attr('class');

              // Split class names into an array (if you need it)
              var classNamesArray = classNames.split(' ');

              var cls_with_plugin_slug = classNamesArray[1];

              var mpm_slug = cls_with_plugin_slug.replace('plugin-card-', '');
              console.log('Top Parent Class Names:', classNames);
              console.log('Top Parent Class Names (Array):', classNamesArray[1]);
              console.log('My Plugin Manager Slug is: ', mpm_slug);

              $(this).html('Saved To List');
        });
    });
</script>