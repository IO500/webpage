UPDATE submissions SET find_mixed = find_easy WHERE (find_mixed = 0 OR find_mixed IS NULL) AND find_easy != 0;
UPDATE submissions SET find_mixed = find_hard WHERE (find_mixed = 0 OR find_mixed IS NULL) AND find_hard != 0;
