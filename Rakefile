require __dir__ + '/scripts/validate'

task :validate, :uri do |t, args|
  args.with_defaults(uri: 'http://host.keaweb.dk/')

  PatternValidator.validate('./assets', '*.css', print_errors: true, validates_css: true)
  RemoteValidator.validate(args[:uri], '.', '*.php', print_errors: true)
end
