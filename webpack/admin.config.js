module.exports = (mix) => {
  mix.ts('resources/js/admin/index.tsx', 'public/js/admin.js')

  // Default theme
  mix.sass('./resources/css/themes/default/admin.scss', 'public/css/themes/default/')
  // Flat-dark theme
  mix.sass('./resources/css/themes/flat-dark/admin.scss', 'public/css/themes/flat-dark/')
  // Flat-light theme
  mix.sass('./resources/css/themes/flat-light/admin.scss', 'public/css/themes/flat-light/')
}
