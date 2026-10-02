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

namespace Gs2\News\Result;

use Gs2\Core\Model\IResult;
use Gs2\News\Model\News;

/**
 * Result of describeNews: List News Articles
 *
 * @see https://docs.gs2.io/api_reference/news/sdk/#describenews
 */
class DescribeNewsResult implements IResult {
    /** @var array List of News Articles */
    private $items;
    /** @var string Hash value of News Article data */
    private $contentHash;
    /** @var string Hash value of template data */
    private $templateHash;

    /** @return array|null List of News Articles */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of News Articles */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of News Articles
     * @return DescribeNewsResult
     */
	public function withItems(?array $items): DescribeNewsResult {
		$this->items = $items;
		return $this;
	}

    /** @return string|null Hash value of News Article data */
	public function getContentHash(): ?string {
		return $this->contentHash;
	}

    /** @param string|null $contentHash Hash value of News Article data */
	public function setContentHash(?string $contentHash) {
		$this->contentHash = $contentHash;
	}

    /**
     * @param string|null $contentHash Hash value of News Article data
     * @return DescribeNewsResult
     */
	public function withContentHash(?string $contentHash): DescribeNewsResult {
		$this->contentHash = $contentHash;
		return $this;
	}

    /** @return string|null Hash value of template data */
	public function getTemplateHash(): ?string {
		return $this->templateHash;
	}

    /** @param string|null $templateHash Hash value of template data */
	public function setTemplateHash(?string $templateHash) {
		$this->templateHash = $templateHash;
	}

    /**
     * @param string|null $templateHash Hash value of template data
     * @return DescribeNewsResult
     */
	public function withTemplateHash(?string $templateHash): DescribeNewsResult {
		$this->templateHash = $templateHash;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeNewsResult {
        if ($data === null) {
            return null;
        }
        return (new DescribeNewsResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return News::fromJson($item);
                },
                $data['items']
            ))
            ->withContentHash(array_key_exists('contentHash', $data) && $data['contentHash'] !== null ? $data['contentHash'] : null)
            ->withTemplateHash(array_key_exists('templateHash', $data) && $data['templateHash'] !== null ? $data['templateHash'] : null);
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
            "contentHash" => $this->getContentHash(),
            "templateHash" => $this->getTemplateHash(),
        );
    }
}