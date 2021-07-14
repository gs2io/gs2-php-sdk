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

namespace Gs2\Lottery\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DescribeProbabilitiesByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $lotteryName;
    /** @var string */
    private $userId;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DescribeProbabilitiesByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getLotteryName(): ?string {
		return $this->lotteryName;
	}

	public function setLotteryName(?string $lotteryName) {
		$this->lotteryName = $lotteryName;
	}

	public function withLotteryName(?string $lotteryName): DescribeProbabilitiesByUserIdRequest {
		$this->lotteryName = $lotteryName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DescribeProbabilitiesByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeProbabilitiesByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeProbabilitiesByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withLotteryName(empty($data['lotteryName']) ? null : $data['lotteryName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "lotteryName" => $this->getLotteryName(),
            "userId" => $this->getUserId(),
        );
    }
}