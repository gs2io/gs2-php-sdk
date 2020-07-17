<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\News\Model;

use Gs2\Core\Model\IModel;

/**
 * お知らせ記事
 *
 * @author Game Server Services, Inc.
 *
 */
class News implements IModel {
	/**
     * @var string セクション名
	 */
	protected $section;

	/**
	 * セクション名を取得
	 *
	 * @return string|null セクション名
	 */
	public function getSection(): ?string {
		return $this->section;
	}

	/**
	 * セクション名を設定
	 *
	 * @param string|null $section セクション名
	 */
	public function setSection(?string $section) {
		$this->section = $section;
	}

	/**
	 * セクション名を設定
	 *
	 * @param string|null $section セクション名
	 * @return News $this
	 */
	public function withSection(?string $section): News {
		$this->section = $section;
		return $this;
	}
	/**
     * @var string コンテンツ名
	 */
	protected $content;

	/**
	 * コンテンツ名を取得
	 *
	 * @return string|null コンテンツ名
	 */
	public function getContent(): ?string {
		return $this->content;
	}

	/**
	 * コンテンツ名を設定
	 *
	 * @param string|null $content コンテンツ名
	 */
	public function setContent(?string $content) {
		$this->content = $content;
	}

	/**
	 * コンテンツ名を設定
	 *
	 * @param string|null $content コンテンツ名
	 * @return News $this
	 */
	public function withContent(?string $content): News {
		$this->content = $content;
		return $this;
	}
	/**
     * @var string 記事見出し
	 */
	protected $title;

	/**
	 * 記事見出しを取得
	 *
	 * @return string|null 記事見出し
	 */
	public function getTitle(): ?string {
		return $this->title;
	}

	/**
	 * 記事見出しを設定
	 *
	 * @param string|null $title 記事見出し
	 */
	public function setTitle(?string $title) {
		$this->title = $title;
	}

	/**
	 * 記事見出しを設定
	 *
	 * @param string|null $title 記事見出し
	 * @return News $this
	 */
	public function withTitle(?string $title): News {
		$this->title = $title;
		return $this;
	}
	/**
     * @var string 配信期間を決定する GS2-Schedule のイベントID
	 */
	protected $scheduleEventId;

	/**
	 * 配信期間を決定する GS2-Schedule のイベントIDを取得
	 *
	 * @return string|null 配信期間を決定する GS2-Schedule のイベントID
	 */
	public function getScheduleEventId(): ?string {
		return $this->scheduleEventId;
	}

	/**
	 * 配信期間を決定する GS2-Schedule のイベントIDを設定
	 *
	 * @param string|null $scheduleEventId 配信期間を決定する GS2-Schedule のイベントID
	 */
	public function setScheduleEventId(?string $scheduleEventId) {
		$this->scheduleEventId = $scheduleEventId;
	}

	/**
	 * 配信期間を決定する GS2-Schedule のイベントIDを設定
	 *
	 * @param string|null $scheduleEventId 配信期間を決定する GS2-Schedule のイベントID
	 * @return News $this
	 */
	public function withScheduleEventId(?string $scheduleEventId): News {
		$this->scheduleEventId = $scheduleEventId;
		return $this;
	}
	/**
     * @var int タイムスタンプ
	 */
	protected $timestamp;

	/**
	 * タイムスタンプを取得
	 *
	 * @return int|null タイムスタンプ
	 */
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}

	/**
	 * タイムスタンプを設定
	 *
	 * @param int|null $timestamp タイムスタンプ
	 */
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}

	/**
	 * タイムスタンプを設定
	 *
	 * @param int|null $timestamp タイムスタンプ
	 * @return News $this
	 */
	public function withTimestamp(?int $timestamp): News {
		$this->timestamp = $timestamp;
		return $this;
	}
	/**
     * @var string Front Matter
	 */
	protected $frontMatter;

	/**
	 * Front Matterを取得
	 *
	 * @return string|null Front Matter
	 */
	public function getFrontMatter(): ?string {
		return $this->frontMatter;
	}

	/**
	 * Front Matterを設定
	 *
	 * @param string|null $frontMatter Front Matter
	 */
	public function setFrontMatter(?string $frontMatter) {
		$this->frontMatter = $frontMatter;
	}

	/**
	 * Front Matterを設定
	 *
	 * @param string|null $frontMatter Front Matter
	 * @return News $this
	 */
	public function withFrontMatter(?string $frontMatter): News {
		$this->frontMatter = $frontMatter;
		return $this;
	}

    public function toJson(): array {
        return array(
            "section" => $this->section,
            "content" => $this->content,
            "title" => $this->title,
            "scheduleEventId" => $this->scheduleEventId,
            "timestamp" => $this->timestamp,
            "frontMatter" => $this->frontMatter,
        );
    }

    public static function fromJson(array $data): News {
        $model = new News();
        $model->setSection(isset($data["section"]) ? $data["section"] : null);
        $model->setContent(isset($data["content"]) ? $data["content"] : null);
        $model->setTitle(isset($data["title"]) ? $data["title"] : null);
        $model->setScheduleEventId(isset($data["scheduleEventId"]) ? $data["scheduleEventId"] : null);
        $model->setTimestamp(isset($data["timestamp"]) ? $data["timestamp"] : null);
        $model->setFrontMatter(isset($data["frontMatter"]) ? $data["frontMatter"] : null);
        return $model;
    }
}