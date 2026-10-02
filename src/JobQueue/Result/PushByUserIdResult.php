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

/**
 * Result of pushByUserId: Register jobs by User ID
 *
 * @see https://docs.gs2.io/api_reference/job_queue/sdk/#pushbyuserid
 */
class PushByUserIdResult implements IResult {
    /** @var array List of Jobs added */
    private $items;
    /** @var bool */
    private $autoRun;

    /** @return array|null List of Jobs added */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of Jobs added */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of Jobs added
     * @return PushByUserIdResult
     */
	public function withItems(?array $items): PushByUserIdResult {
		$this->items = $items;
		return $this;
	}

    /** @return bool|null */
	public function getAutoRun(): ?bool {
		return $this->autoRun;
	}

    /** @param bool|null $autoRun */
	public function setAutoRun(?bool $autoRun) {
		$this->autoRun = $autoRun;
	}

    /**
     * @param bool|null $autoRun
     * @return PushByUserIdResult
     */
	public function withAutoRun(?bool $autoRun): PushByUserIdResult {
		$this->autoRun = $autoRun;
		return $this;
	}

    public static function fromJson(?array $data): ?PushByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new PushByUserIdResult())
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