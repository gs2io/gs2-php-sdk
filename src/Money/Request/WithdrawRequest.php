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

class WithdrawRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
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

	public function withNamespaceName(?string $namespaceName): WithdrawRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): WithdrawRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getSlot(): ?int {
		return $this->slot;
	}

	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}

	public function withSlot(?int $slot): WithdrawRequest {
		$this->slot = $slot;
		return $this;
	}

	public function getCount(): ?int {
		return $this->count;
	}

	public function setCount(?int $count) {
		$this->count = $count;
	}

	public function withCount(?int $count): WithdrawRequest {
		$this->count = $count;
		return $this;
	}

	public function getPaidOnly(): ?bool {
		return $this->paidOnly;
	}

	public function setPaidOnly(?bool $paidOnly) {
		$this->paidOnly = $paidOnly;
	}

	public function withPaidOnly(?bool $paidOnly): WithdrawRequest {
		$this->paidOnly = $paidOnly;
		return $this;
	}

    public static function fromJson(?array $data): ?WithdrawRequest {
        if ($data === null) {
            return null;
        }
        return (new WithdrawRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken'])
            ->withSlot(empty($data['slot']) ? null : $data['slot'])
            ->withCount(empty($data['count']) ? null : $data['count'])
            ->withPaidOnly(empty($data['paidOnly']) ? null : $data['paidOnly']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "slot" => $this->getSlot(),
            "count" => $this->getCount(),
            "paidOnly" => $this->getPaidOnly(),
        );
    }
}