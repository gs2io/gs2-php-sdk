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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetCounterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $counterName;
    /** @var string */
    private $accessToken;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): GetCounterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getCounterName(): ?string {
		return $this->counterName;
	}

	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}

	public function withCounterName(?string $counterName): GetCounterRequest {
		$this->counterName = $counterName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): GetCounterRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetCounterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetCounterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withCounterName(empty($data['counterName']) ? null : $data['counterName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "counterName" => $this->getCounterName(),
            "accessToken" => $this->getAccessToken(),
        );
    }
}