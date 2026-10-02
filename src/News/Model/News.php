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
 * News Article
 *
 * @see https://docs.gs2.io/api_reference/news/sdk/#news
 */
class News implements IModel {
	/**
     * @var string Section Name
	 */
	private $section;
	/**
     * @var string Content
	 */
	private $content;
	/**
     * @var string Article Headline
	 */
	private $title;
	/**
     * @var string GS2-Schedule Event GRN
	 */
	private $scheduleEventId;
	/**
     * @var int Timestamp
	 */
	private $timestamp;
	/**
     * @var string Front Matter
	 */
	private $frontMatter;
    /** @return string|null Section Name */
	public function getSection(): ?string {
		return $this->section;
	}
    /** @param string|null $section Section Name */
	public function setSection(?string $section) {
		$this->section = $section;
	}
    /**
     * @param string|null $section Section Name
     * @return News
     */
	public function withSection(?string $section): News {
		$this->section = $section;
		return $this;
	}
    /** @return string|null Content */
	public function getContent(): ?string {
		return $this->content;
	}
    /** @param string|null $content Content */
	public function setContent(?string $content) {
		$this->content = $content;
	}
    /**
     * @param string|null $content Content
     * @return News
     */
	public function withContent(?string $content): News {
		$this->content = $content;
		return $this;
	}
    /** @return string|null Article Headline */
	public function getTitle(): ?string {
		return $this->title;
	}
    /** @param string|null $title Article Headline */
	public function setTitle(?string $title) {
		$this->title = $title;
	}
    /**
     * @param string|null $title Article Headline
     * @return News
     */
	public function withTitle(?string $title): News {
		$this->title = $title;
		return $this;
	}
    /** @return string|null GS2-Schedule Event GRN */
	public function getScheduleEventId(): ?string {
		return $this->scheduleEventId;
	}
    /** @param string|null $scheduleEventId GS2-Schedule Event GRN */
	public function setScheduleEventId(?string $scheduleEventId) {
		$this->scheduleEventId = $scheduleEventId;
	}
    /**
     * @param string|null $scheduleEventId GS2-Schedule Event GRN
     * @return News
     */
	public function withScheduleEventId(?string $scheduleEventId): News {
		$this->scheduleEventId = $scheduleEventId;
		return $this;
	}
    /** @return int|null Timestamp */
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
    /** @param int|null $timestamp Timestamp */
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
    /**
     * @param int|null $timestamp Timestamp
     * @return News
     */
	public function withTimestamp(?int $timestamp): News {
		$this->timestamp = $timestamp;
		return $this;
	}
    /** @return string|null Front Matter */
	public function getFrontMatter(): ?string {
		return $this->frontMatter;
	}
    /** @param string|null $frontMatter Front Matter */
	public function setFrontMatter(?string $frontMatter) {
		$this->frontMatter = $frontMatter;
	}
    /**
     * @param string|null $frontMatter Front Matter
     * @return News
     */
	public function withFrontMatter(?string $frontMatter): News {
		$this->frontMatter = $frontMatter;
		return $this;
	}

    public static function fromJson(?array $data): ?News {
        if ($data === null) {
            return null;
        }
        return (new News())
            ->withSection(array_key_exists('section', $data) && $data['section'] !== null ? $data['section'] : null)
            ->withContent(array_key_exists('content', $data) && $data['content'] !== null ? $data['content'] : null)
            ->withTitle(array_key_exists('title', $data) && $data['title'] !== null ? $data['title'] : null)
            ->withScheduleEventId(array_key_exists('scheduleEventId', $data) && $data['scheduleEventId'] !== null ? $data['scheduleEventId'] : null)
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null)
            ->withFrontMatter(array_key_exists('frontMatter', $data) && $data['frontMatter'] !== null ? $data['frontMatter'] : null);
    }

    public function toJson(): array {
        return array(
            "section" => $this->getSection(),
            "content" => $this->getContent(),
            "title" => $this->getTitle(),
            "scheduleEventId" => $this->getScheduleEventId(),
            "timestamp" => $this->getTimestamp(),
            "frontMatter" => $this->getFrontMatter(),
        );
    }
}