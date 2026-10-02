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
 * Content
 *
 * @see https://docs.gs2.io/api_reference/news/sdk/#content
 */
class Content implements IModel {
	/**
     * @var string Section
	 */
	private $section;
	/**
     * @var string Content Path
	 */
	private $content;
	/**
     * @var string Front Matter
	 */
	private $frontMatter;
    /** @return string|null Section */
	public function getSection(): ?string {
		return $this->section;
	}
    /** @param string|null $section Section */
	public function setSection(?string $section) {
		$this->section = $section;
	}
    /**
     * @param string|null $section Section
     * @return Content
     */
	public function withSection(?string $section): Content {
		$this->section = $section;
		return $this;
	}
    /** @return string|null Content Path */
	public function getContent(): ?string {
		return $this->content;
	}
    /** @param string|null $content Content Path */
	public function setContent(?string $content) {
		$this->content = $content;
	}
    /**
     * @param string|null $content Content Path
     * @return Content
     */
	public function withContent(?string $content): Content {
		$this->content = $content;
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
     * @return Content
     */
	public function withFrontMatter(?string $frontMatter): Content {
		$this->frontMatter = $frontMatter;
		return $this;
	}

    public static function fromJson(?array $data): ?Content {
        if ($data === null) {
            return null;
        }
        return (new Content())
            ->withSection(array_key_exists('section', $data) && $data['section'] !== null ? $data['section'] : null)
            ->withContent(array_key_exists('content', $data) && $data['content'] !== null ? $data['content'] : null)
            ->withFrontMatter(array_key_exists('frontMatter', $data) && $data['frontMatter'] !== null ? $data['frontMatter'] : null);
    }

    public function toJson(): array {
        return array(
            "section" => $this->getSection(),
            "content" => $this->getContent(),
            "frontMatter" => $this->getFrontMatter(),
        );
    }
}