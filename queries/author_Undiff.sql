SELECT
--c.condition_code_num,
c.index_entry as entry,
--right (c.field, -5) as subfield_entry,
substring (c.field, 0, 7) as marc,
--substring (c.title, 0, 50)||'...' as title,
c.title as title,
m.record_type_code || m.record_num ||'a' as record_num,
CASE
WHEN v.varfield_type_code = 'o' AND v.marc_tag = '001' THEN v.field_content
ELSE null
END AS oclc_num,
CASE
WHEN (v.varfield_type_code = 'o' AND v.marc_tag = '001' AND (v.field_content ~ '^[0-9]+$')) THEN 'true'
ELSE null
END AS oclc_bool,
--c.index_tag,
------------------------- [start case Bib Material Type]
--b.bcode2,
--CASE
--WHEN c.index_tag = 'a' AND c.field ~'^a|^b' THEN 'AUTHOR names'
--WHEN c.index_tag = 'd' AND c.field ~'^d6[0-3]' THEN 'SUBJECT names'
--WHEN c.index_tag = 'd' AND c.field ~'^d65' THEN 'SUBJECT topics'
--WHEN c.field ~'^s' THEN 'SERIES'
--ELSE ''
--END AS heading_type,
--c.program_code,
c.iii_user_name as user_name,
--substring(''||date_trunc('WEEK',now())::DATE - '1 week'::INTERVAL, 0, 11) as week_start,
--''||date_trunc('WEEK',now())::DATE as week_end,
right(''||c.process_gmt::DATE, 5)||left('-'||c.process_gmt::DATE, 5) as process_date

FROM
sierra_view.catmaint as c

JOIN
sierra_view.record_metadata as m
ON
m.id = c.record_metadata_id

LEFT OUTER JOIN
sierra_view.bib_view as b
ON
m.id = b.id

LEFT OUTER JOIN
sierra_view.varfield v
ON ((v.record_id = m.id) AND v.marc_tag = '001' )

WHERE
((c.condition_code_num = 1) and (field ~'^a10|^b10|^a70|^b70')) -- AUTHOR NAMES
--An integer that identifies certain headings conditions applicable to the various headings reports. Possible values include: 
--1 = First time use (specified by the usg_valid_check EO) 2 = Invalid entries 3 = Duplicate call numbers and other conditions (specified by the usg_dup_check EO) 4 = Blind references 5 = Duplicate authority records 6 = Authority updates (written by auth2bib) 7 = Near matches (written by auth2bib) 8 = Busy matches (written by auth2bib) 9 = Non-unique 4XXs (written by auth2bib) 0 = Cross-thesaurus matches (by auth2bib) 11 = Missing Form or Subfield 8 12 = Missing Form 2 13 = Blank bib CAT DATE updated with date value 
--c.condition_code_num = 1 and field ~'^d6[0-3]'-- SUBJECT names
--c.condition_code_num = 1 and field ~'^d65'-- SUBJECT topics
--c.condition_code_num = 1 and field ~'^s'-- SERIES headings
--AND c.process_gmt <= date_trunc('WEEK',now())::DATE 
AND 
(
    (c.field NOT LIKE '%|b%') AND
    (c.field NOT LIKE '%|c%') AND
    (c.field NOT LIKE '%|d%') AND
    (c.field NOT LIKE '%|f%') AND
    (c.field NOT LIKE '%|j%') AND
    (c.field NOT LIKE '%|k%') AND
    (c.field NOT LIKE '%|l%') AND
    (c.field NOT LIKE '%|n%') AND
    (c.field NOT LIKE '%|p%') AND
    (c.field NOT LIKE '%|q%') AND
    (c.field NOT LIKE '%|t%') AND
    (c.field NOT LIKE '%|u%')
)