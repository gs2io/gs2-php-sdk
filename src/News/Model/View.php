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


class View implements IModel {
	/**
     * @var array
	 */
	private $contents;
	/**
     * @var array
	 */
	private $removeContents;
	public function getContents(): ?array {
		return $this->contents;
	}
	public function setContents(?array $contents) {
		$this->contents = $contents;
	}
	public function withContents(?array $contents): View {
		$this->contents = $contents;
		return $this;
	}
	public function getRemoveContents(): ?array {
		return $this->removeContents;
	}
	public function setRemoveContents(?array $removeContents) {
		$this->removeContents = $removeContents;
	}
	public function withRemoveContents(?array $removeContents): View {
		$this->removeContents = $removeContents;
		return $this;
	}

    public static function fromJson(?array $data): ?View {
        if ($data === null) {
            return null;
        }
        return (new View())
            ->withContents(!array_key_exists('contents', $data) || $data['contents'] === null ? null : array_map(
                function ($item) {
                    return Content::fromJson($item);
                },
                $data['contents']
            ))
            ->withRemoveContents(!array_key_exists('removeContents', $data) || $data['removeContents'] === null ? null : array_map(
                function ($item) {
                    return Content::fromJson($item);
                },
                $data['removeContents']
            ));
    }

    public function toJson(): array {
        return array(
            "contents" => $this->getContents() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getContents()
            ),
            "removeContents" => $this->getRemoveContents() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRemoveContents()
            ),
        );
    }
}