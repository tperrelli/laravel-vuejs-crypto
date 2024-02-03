import currencyFormatter from 'currency-formatter';

export const formatMoney = (value, lang = 'en-US') => currencyFormatter.format(value, { locale: lang });