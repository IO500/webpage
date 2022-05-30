#!/usr/bin/env Rscript

list.of.packages <- c(
  "plyr",
  "dplyr",
  "ggplot2",
  "plotly",
  "htmlwidgets"
)

new.packages <- list.of.packages[!(list.of.packages %in% installed.packages()[,"Package"])]

if (length(new.packages)) {
  install.packages(new.packages)
}

library(plyr, warn.conflicts = FALSE, quietly = T)
library(dplyr, warn.conflicts = FALSE, quietly = T)
library(ggplot2, warn.conflicts = FALSE, quietly = T)
library(plotly, warn.conflicts = FALSE, quietly = T)
library(htmlwidgets, warn.conflicts = FALSE, quietly = T)

# Download all the CSV files we require to generate the plots

url = 'https://io500.org/download/'

bofs = list(
  'SC17',
  'ISC18',
  'SC18',
  'SC18*',
  'ISC19',
  'SC19',
  'ISC20',
  'SC20',
  'ISC21',
  'SC21',
  'ISC22'
)

datalist = list()

for (bof in bofs) {
  message(paste0('Downloading: ', url, bof, '/io500'))

  data <- read.csv(paste0(url, bof, '/io500'))
  data$bof <- bof

  datalist[[bof]] <- data
}

if (dir.exists('plotly')) {
  unlink('plotly', recursive = TRUE, force = TRUE)
}

dir.create('plotly')

df <- do.call(rbind, datalist)

message(paste0('Preparing the dataset...'))

# Make sure our factors follow the pre-defined order
df$list_name <- factor(df$bof, levels = bofs)

df$entry <- paste(df$information_system, df$information_filesystem, df$information_institution, sep = " | ")

df$text <- paste(
  'List: ', df$list_name, '<br>',
  'System: ', df$information_system, '<br>',
  'File System: ', df$information_filesystem_type, '<br>',
  'Institution: ', df$information_institution
)

# IO500 Score

message(paste0('Generating interative plots...'))

message(paste0('> IO500 Score'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = score,
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("IO500 Score") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

options(warn = -1)

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-score.html"))

# IO500 Bandwidth

message(paste0('> IO500 Bandwidth'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = io500_bw,
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("IO500 Bandwidth (GiB/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-bandwidth.html"))

# IO500 Metadata

message(paste0('> IO500 Metadata'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = io500_md,
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("IO500 Metadata (KIOP/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-metadata.html"))

# IO500 IOR Plots

# IO500 Easy Write

message(paste0('> IOR Easy Write'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = as.numeric(as.character(ior_easy_write)),
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("IOR Easy Write (GiB/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-ior-easy-write.html"))

# IO500 Easy Read

message(paste0('> IOR Easy Read'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = as.numeric(as.character(ior_easy_read)),
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("IOR Easy Read (GiB/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-ior-easy-read.html"))

# IO500 Hard Write

message(paste0('> IOR Hard Write'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = as.numeric(as.character(ior_hard_write)),
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("IOR Hard Write (GiB/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-ior-hard-write.html"))

# IO500 Hard Read

message(paste0('> IOR Hard Read'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = as.numeric(as.character(ior_hard_read)),
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("IOR Hard Read (GiB/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-ior-hard-read.html"))

# IO500 MDtest Plots

# IO500 MDtest Easy Write

message(paste0('> MDtest Easy Write'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = as.numeric(as.character(mdtest_easy_write)),
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("MDtest Easy Write (kIOP/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-mdtest-easy-write.html"))

# IO500 MDtest Easy Stat

message(paste0('> MDtest Easy Stat'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = as.numeric(as.character(mdtest_easy_stat)),
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("MDtest Easy Stat (kIOP/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-mdtest-easy-stat.html"))

# IO500 MDtest Easy Delete

message(paste0('> MDtest Easy Delete'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = as.numeric(as.character(mdtest_easy_delete)),
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("MDtest Easy Delete (kIOP/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-mdtest-easy-delete.html"))

# IO500 MDtest Hard Write

message(paste0('> MDtest Hard Write'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = as.numeric(as.character(mdtest_hard_write)),
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("MDtest Hard Write (kIOP/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-mdtest-hard-write.html"))

# IO500 MDtest Hard Read

message(paste0('> MDtest Hard Read'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = as.numeric(as.character(mdtest_hard_read)),
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("MDtest Hard Read (kIOP/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-mdtest-hard-read.html"))

# IO500 MDtest Hard Stat

message(paste0('> MDtest Hard Stat'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = as.numeric(as.character(mdtest_hard_stat)),
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("MDtest Hard Stat (kIOP/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-mdtest-hard-stat.html"))

# IO500 MDtest Hard Delete

message(paste0('> MDtest Hard Delete'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = as.numeric(as.character(mdtest_hard_delete)),
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("MDtest Hard Delete (kIOP/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-mdtest-hard-delete.html"))

# IO500 Find Plot

message(paste0('> Find'))

plot <- ggplot(
  df,
  aes(
    x = list_name,
    y = as.numeric(as.character(find_hard)),
    color = list_name,
    text = text
  )) + 
  geom_jitter(size = 1, width = 0.3) +
  scale_colour_manual(
    values = c(
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30",
      "#ec563c",
      "#1d2a30"
    )
  ) +
  xlab("") +
  ylab("Find (kIOP/s)") + 
  theme_bw() +
  theme(
    legend.position = "none",
    plot.title = element_text(size = 10),
    axis.title.y = element_text(vjust = 0.4), 
    strip.background = element_rect(colour = NA, fill = NA)
  )

p <- ggplotly(plot, width = 1100, height = 400, tooltip = "text") %>%
  rangeslider(start = length(bofs) - 4.5, end = length(bofs) + 0.5, thickness = 0.05) %>%
  layout(margin = list(pad = 0), yaxis = list(fixedrange = FALSE)) %>%
  layout(autosize = FALSE) %>%
  toWebGL()

p$sizingPolicy$padding <- "0"

saveWidget(p, selfcontained = FALSE, file.path(getwd(), "plotly/", "io500-find.html"))

message(paste0('DONE'))
