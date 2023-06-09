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

namespace Gs2\Idle\Result;

use Gs2\Core\Model\IResult;
use Gs2\Idle\Model\AcquireAction;
use Gs2\Idle\Model\Status;

class PredictionByUserIdResult implements IResult {
    /** @var array */
    private $items;
    /** @var Status */
    private $status;

	public function getItems(): ?array {
		return $this->items;
	}

	public function setItems(?array $items) {
		$this->items = $items;
	}

	public function withItems(?array $items): PredictionByUserIdResult {
		$this->items = $items;
		return $this;
	}

	public function getStatus(): ?Status {
		return $this->status;
	}

	public function setStatus(?Status $status) {
		$this->status = $status;
	}

	public function withStatus(?Status $status): PredictionByUserIdResult {
		$this->status = $status;
		return $this;
	}

    public static function fromJson(?array $data): ?PredictionByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new PredictionByUserIdResult())
            ->withItems(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('items', $data) && $data['items'] !== null ? $data['items'] : []
            ))
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? Status::fromJson($data['status']) : null);
    }

    public function toJson(): array {
        return array(
            "items" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems() !== null && $this->getItems() !== null ? $this->getItems() : []
            ),
            "status" => $this->getStatus() !== null ? $this->getStatus()->toJson() : null,
        );
    }
}