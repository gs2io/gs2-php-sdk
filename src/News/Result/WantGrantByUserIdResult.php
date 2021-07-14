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

class WantGrantByUserIdResult implements IResult {
    /** @var array */
    private $items;
    /** @var string */
    private $browserUrl;
    /** @var string */
    private $zipUrl;

	public function getItems(): ?array {
		return $this->items;
	}

	public function setItems(?array $items) {
		$this->items = $items;
	}

	public function withItems(?array $items): WantGrantByUserIdResult {
		$this->items = $items;
		return $this;
	}

	public function getBrowserUrl(): ?string {
		return $this->browserUrl;
	}

	public function setBrowserUrl(?string $browserUrl) {
		$this->browserUrl = $browserUrl;
	}

	public function withBrowserUrl(?string $browserUrl): WantGrantByUserIdResult {
		$this->browserUrl = $browserUrl;
		return $this;
	}

	public function getZipUrl(): ?string {
		return $this->zipUrl;
	}

	public function setZipUrl(?string $zipUrl) {
		$this->zipUrl = $zipUrl;
	}

	public function withZipUrl(?string $zipUrl): WantGrantByUserIdResult {
		$this->zipUrl = $zipUrl;
		return $this;
	}

    public static function fromJson(?array $data): ?WantGrantByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new WantGrantByUserIdResult())
            ->withItems(array_map(
                function ($item) {
                    return SetCookieRequestEntry::fromJson($item);
                },
                array_key_exists('items', $data) && $data['items'] !== null ? $data['items'] : []
            ))
            ->withBrowserUrl(empty($data['browserUrl']) ? null : $data['browserUrl'])
            ->withZipUrl(empty($data['zipUrl']) ? null : $data['zipUrl']);
    }

    public function toJson(): array {
        return array(
            "items" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems() !== null && $this->getItems() !== null ? $this->getItems() : []
            ),
            "browserUrl" => $this->getBrowserUrl(),
            "zipUrl" => $this->getZipUrl(),
        );
    }
}