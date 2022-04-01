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

namespace Gs2\Money\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class WithdrawByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var int */
    private $slot;
    /** @var int */
    private $count;
    /** @var bool */
    private $paidOnly;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): WithdrawByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): WithdrawByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getSlot(): ?int {
		return $this->slot;
	}

	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}

	public function withSlot(?int $slot): WithdrawByUserIdRequest {
		$this->slot = $slot;
		return $this;
	}

	public function getCount(): ?int {
		return $this->count;
	}

	public function setCount(?int $count) {
		$this->count = $count;
	}

	public function withCount(?int $count): WithdrawByUserIdRequest {
		$this->count = $count;
		return $this;
	}

	public function getPaidOnly(): ?bool {
		return $this->paidOnly;
	}

	public function setPaidOnly(?bool $paidOnly) {
		$this->paidOnly = $paidOnly;
	}

	public function withPaidOnly(?bool $paidOnly): WithdrawByUserIdRequest {
		$this->paidOnly = $paidOnly;
		return $this;
	}

    public static function fromJson(?array $data): ?WithdrawByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new WithdrawByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSlot(array_key_exists('slot', $data) && $data['slot'] !== null ? $data['slot'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withPaidOnly($data['paidOnly']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "slot" => $this->getSlot(),
            "count" => $this->getCount(),
            "paidOnly" => $this->getPaidOnly(),
        );
    }
}