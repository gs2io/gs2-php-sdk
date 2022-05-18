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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Formation\Model\Slot;

class SetFormByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $moldName;
    /** @var int */
    private $index;
    /** @var array */
    private $slots;
    /** @var string */
    private $duplicationAvoider;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): SetFormByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): SetFormByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getMoldName(): ?string {
		return $this->moldName;
	}

	public function setMoldName(?string $moldName) {
		$this->moldName = $moldName;
	}

	public function withMoldName(?string $moldName): SetFormByUserIdRequest {
		$this->moldName = $moldName;
		return $this;
	}

	public function getIndex(): ?int {
		return $this->index;
	}

	public function setIndex(?int $index) {
		$this->index = $index;
	}

	public function withIndex(?int $index): SetFormByUserIdRequest {
		$this->index = $index;
		return $this;
	}

	public function getSlots(): ?array {
		return $this->slots;
	}

	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}

	public function withSlots(?array $slots): SetFormByUserIdRequest {
		$this->slots = $slots;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetFormByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetFormByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetFormByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withMoldName(array_key_exists('moldName', $data) && $data['moldName'] !== null ? $data['moldName'] : null)
            ->withIndex(array_key_exists('index', $data) && $data['index'] !== null ? $data['index'] : null)
            ->withSlots(array_map(
                function ($item) {
                    return Slot::fromJson($item);
                },
                array_key_exists('slots', $data) && $data['slots'] !== null ? $data['slots'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "moldName" => $this->getMoldName(),
            "index" => $this->getIndex(),
            "slots" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSlots() !== null && $this->getSlots() !== null ? $this->getSlots() : []
            ),
        );
    }
}