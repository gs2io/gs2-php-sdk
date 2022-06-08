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


class News implements IModel {
	/**
     * @var string
	 */
	private $section;
	/**
     * @var string
	 */
	private $content;
	/**
     * @var string
	 */
	private $title;
	/**
     * @var string
	 */
	private $scheduleEventId;
	/**
     * @var int
	 */
	private $timestamp;
	/**
     * @var string
	 */
	private $frontMatter;
	public function getSection(): ?string {
		return $this->section;
	}
	public function setSection(?string $section) {
		$this->section = $section;
	}
	public function withSection(?string $section): News {
		$this->section = $section;
		return $this;
	}
	public function getContent(): ?string {
		return $this->content;
	}
	public function setContent(?string $content) {
		$this->content = $content;
	}
	public function withContent(?string $content): News {
		$this->content = $content;
		return $this;
	}
	public function getTitle(): ?string {
		return $this->title;
	}
	public function setTitle(?string $title) {
		$this->title = $title;
	}
	public function withTitle(?string $title): News {
		$this->title = $title;
		return $this;
	}
	public function getScheduleEventId(): ?string {
		return $this->scheduleEventId;
	}
	public function setScheduleEventId(?string $scheduleEventId) {
		$this->scheduleEventId = $scheduleEventId;
	}
	public function withScheduleEventId(?string $scheduleEventId): News {
		$this->scheduleEventId = $scheduleEventId;
		return $this;
	}
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
	public function withTimestamp(?int $timestamp): News {
		$this->timestamp = $timestamp;
		return $this;
	}
	public function getFrontMatter(): ?string {
		return $this->frontMatter;
	}
	public function setFrontMatter(?string $frontMatter) {
		$this->frontMatter = $frontMatter;
	}
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