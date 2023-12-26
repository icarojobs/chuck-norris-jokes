# THE CHUCK NORRIS JOKES PACKAGE

### BASHRC OR ZSHRC ALIASES I MADE
```bash
alias phpunit="./vendor/bin/phpunit"
alias coverage="rm -rf reports && XDEBUG_MODE=coverage phpunit --coverage-clover=reports/coverage-clover.xml --coverage-html=reports/coverage.html --coverage-text=reports/coverage.txt"
```

### RUNNING TESTS WITH COVERAGE REPORT
```bash
coverage
```