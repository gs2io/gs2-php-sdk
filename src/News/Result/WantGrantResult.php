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
use Gs2\News\Model\SetCookieRequestEntry;

/**
 * Result of wantGrant: Get the information needed to access the News Article
 *
 * @see https://docs.gs2.io/api_reference/news/sdk/#wantgrant
 */
class WantGrantResult implements IResult {
    /** @var array List of cookies that need to be set in order to access the content */
    private $items;
    /** @var string URL to access the content */
    private $browserUrl;
    /** @var string URL to access the announcement contents in ZIP format (Cookie setting is not required for access) */
    private $zipUrl;

    /** @return array|null List of cookies that need to be set in order to access the content */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of cookies that need to be set in order to access the content */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of cookies that need to be set in order to access the content
     * @return WantGrantResult
     */
	public function withItems(?array $items): WantGrantResult {
		$this->items = $items;
		return $this;
	}

    /** @return string|null URL to access the content */
	public function getBrowserUrl(): ?string {
		return $this->browserUrl;
	}

    /** @param string|null $browserUrl URL to access the content */
	public function setBrowserUrl(?string $browserUrl) {
		$this->browserUrl = $browserUrl;
	}

    /**
     * @param string|null $browserUrl URL to access the content
     * @return WantGrantResult
     */
	public function withBrowserUrl(?string $browserUrl): WantGrantResult {
		$this->browserUrl = $browserUrl;
		return $this;
	}

    /** @return string|null URL to access the announcement contents in ZIP format (Cookie setting is not required for access) */
	public function getZipUrl(): ?string {
		return $this->zipUrl;
	}

    /** @param string|null $zipUrl URL to access the announcement contents in ZIP format (Cookie setting is not required for access) */
	public function setZipUrl(?string $zipUrl) {
		$this->zipUrl = $zipUrl;
	}

    /**
     * @param string|null $zipUrl URL to access the announcement contents in ZIP format (Cookie setting is not required for access)
     * @return WantGrantResult
     */
	public function withZipUrl(?string $zipUrl): WantGrantResult {
		$this->zipUrl = $zipUrl;
		return $this;
	}

    public static function fromJson(?array $data): ?WantGrantResult {
        if ($data === null) {
            return null;
        }
        return (new WantGrantResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return SetCookieRequestEntry::fromJson($item);
                },
                $data['items']
            ))
            ->withBrowserUrl(array_key_exists('browserUrl', $data) && $data['browserUrl'] !== null ? $data['browserUrl'] : null)
            ->withZipUrl(array_key_exists('zipUrl', $data) && $data['zipUrl'] !== null ? $data['zipUrl'] : null);
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
            "browserUrl" => $this->getBrowserUrl(),
            "zipUrl" => $this->getZipUrl(),
        );
    }
}