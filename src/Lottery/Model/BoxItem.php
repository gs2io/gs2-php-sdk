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

namespace Gs2\Lottery\Model;

use Gs2\Core\Model\IModel;


class BoxItem implements IModel {
	/**
     * @var array
	 */
	private $acquireActions;
	/**
     * @var int
	 */
	private $remaining;
	/**
     * @var int
	 */
	private $initial;

	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}

	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}

	public function withAcquireActions(?array $acquireActions): BoxItem {
		$this->acquireActions = $acquireActions;
		return $this;
	}

	public function getRemaining(): ?int {
		return $this->remaining;
	}

	public function setRemaining(?int $remaining) {
		$this->remaining = $remaining;
	}

	public function withRemaining(?int $remaining): BoxItem {
		$this->remaining = $remaining;
		return $this;
	}

	public function getInitial(): ?int {
		return $this->initial;
	}

	public function setInitial(?int $initial) {
		$this->initial = $initial;
	}

	public function withInitial(?int $initial): BoxItem {
		$this->initial = $initial;
		return $this;
	}

    public static function fromJson(?array $data): ?BoxItem {
        if ($data === null) {
            return null;
        }
        return (new BoxItem())
            ->withAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('acquireActions', $data) && $data['acquireActions'] !== null ? $data['acquireActions'] : []
            ))
            ->withRemaining(empty($data['remaining']) ? null : $data['remaining'])
            ->withInitial(empty($data['initial']) ? null : $data['initial']);
    }

    public function toJson(): array {
        return array(
            "acquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions() !== null && $this->getAcquireActions() !== null ? $this->getAcquireActions() : []
            ),
            "remaining" => $this->getRemaining(),
            "initial" => $this->getInitial(),
        );
    }
}