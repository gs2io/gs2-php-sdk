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

namespace Gs2\Freeze\Result;

use Gs2\Core\Model\IResult;
use Gs2\Freeze\Model\Stage;

class DescribeStagesResult implements IResult {
    /** @var array */
    private $items;

	public function getItems(): ?array {
		return $this->items;
	}

	public function setItems(?array $items) {
		$this->items = $items;
	}

	public function withItems(?array $items): DescribeStagesResult {
		$this->items = $items;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeStagesResult {
        if ($data === null) {
            return null;
        }
        return (new DescribeStagesResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return Stage::fromJson($item);
                },
                $data['items']
            ));
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
        );
    }
}