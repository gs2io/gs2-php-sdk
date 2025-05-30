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

namespace Gs2\JobQueue\Result;

use Gs2\Core\Model\IResult;
use Gs2\JobQueue\Model\Job;

class PushByStampSheetResult implements IResult {
    /** @var array */
    private $items;
    /** @var bool */
    private $autoRun;

	public function getItems(): ?array {
		return $this->items;
	}

	public function setItems(?array $items) {
		$this->items = $items;
	}

	public function withItems(?array $items): PushByStampSheetResult {
		$this->items = $items;
		return $this;
	}

	public function getAutoRun(): ?bool {
		return $this->autoRun;
	}

	public function setAutoRun(?bool $autoRun) {
		$this->autoRun = $autoRun;
	}

	public function withAutoRun(?bool $autoRun): PushByStampSheetResult {
		$this->autoRun = $autoRun;
		return $this;
	}

    public static function fromJson(?array $data): ?PushByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new PushByStampSheetResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return Job::fromJson($item);
                },
                $data['items']
            ))
            ->withAutoRun(array_key_exists('autoRun', $data) ? $data['autoRun'] : null);
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
            "autoRun" => $this->getAutoRun(),
        );
    }
}