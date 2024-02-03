import dayjs from "dayjs";

export const dateFormat = (value, format = null) => dayjs(value).toString();
