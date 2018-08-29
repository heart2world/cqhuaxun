<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss met-shownews animsition">
    <div class="container">
        <div class="row">
            <if value="$_M['form']['pageset']">
                <if value="$sidebar">
                    <div class="col-md-9 met-shownews-body <if value='!$ui[position]'>pright</if>" m-id='{$ui.mid}'>
                        <div class="row">
                <else/>
                    <div class="met-shownews-body col-md-10 offset-md-1" m-id='{$ui.mid}'>
                        <div class="row">
                </if>
            <else/>
                <if value="$ui[has][sidebar]">
                    <div class="col-md-9 met-shownews-body <if value='!$ui[position]'>pright</if>" m-id='{$ui.mid}'>
                        <div class="row">
                <else/>
                    <div class="met-shownews-body col-md-10 offset-md-1" m-id='{$ui.mid}'>
                        <div class="row">
                </if>
            </if>
                <ol class="breadcrumb m-b-0 subcolumn-crumbs">
                    <li class='breadcrumb-item'>
                        <a href="{$c.index_url}" title="{$word.home}" class='icon wb-home'>{$word.home}</a>
                    </li>
                    <location>
                    <if value="$v[name]">
                        <li class='breadcrumb-item'>
                            <a href="{$v.url}" title="{$v.name}" class='{$v.class}'>{$v.name}</a>
                        </li>
                    </if>
                    </location>
                </ol>
                <div class="met-shownews-content">
                    <section class="details-title border-bottom1">
                        <h1 class='m-t-10 m-b-5'>{$data.title}</h1>
                        <div class="info font-weight-300">
                            <span>{$data.updatetime}</span>
                            <span>{$data.issue}</span>
                            <span>
                                <i class="icon wb-eye m-r-5" aria-hidden="true"></i>
                                {$data.hits}
                            </span>
                        </div>
                    </section>
                    <section class="met-editor clearfix">
                        {$data.content}
                    </section>
                    <div class="tag">
                        <span>{$data.tagname}</span>
                        <list data="$data[taglist]" name="$tag" num="$ui[tag_num]">
                            <a href="{$tag.url}" title="{$tag.name}">{$tag.name}</a>
                        </list>
                    </div>
                    <pagination/>
                </div>
            </div>
        </div>
<if value="$_M['form']['pageset']">
    <if value="!$sidebar">
                </div>
            </div>
        </main>
    </if>
<else/>
<if value="!$ui[has][sidebar]">
                </div>
            </div>
        </main>
    </if>
</if>