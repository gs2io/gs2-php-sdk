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

class DescribeProbabilitiesRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $lotteryName;
    /** @var string */
    private $accessToken;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DescribeProbabilitiesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getLotteryName(): ?string {
		return $this->lotteryName;
	}

	public function setLotteryName(?string $lotteryName) {
		$this->lotteryName = $lotteryName;
	}

	public function withLotteryName(?string $lotteryName): DescribeProbabilitiesRequest {
		$this->lotteryName = $lotteryName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): DescribeProbabilitiesRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeProbabilitiesRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeProbabilitiesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withLotteryName(array_key_exists('lotteryName', $data) && $data['lotteryName'] !== null ? $data['lotteryName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "lotteryName" => $this->getLotteryName(),
            "accessToken" => $this->getAccessToken(),
        );
    }
}