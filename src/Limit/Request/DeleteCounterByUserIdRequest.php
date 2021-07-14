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

namespace Gs2\Limit\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DeleteCounterByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $limitName;
    /** @var string */
    private $userId;
    /** @var string */
    private $counterName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DeleteCounterByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getLimitName(): ?string {
		return $this->limitName;
	}

	public function setLimitName(?string $limitName) {
		$this->limitName = $limitName;
	}

	public function withLimitName(?string $limitName): DeleteCounterByUserIdRequest {
		$this->limitName = $limitName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DeleteCounterByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getCounterName(): ?string {
		return $this->counterName;
	}

	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}

	public function withCounterName(?string $counterName): DeleteCounterByUserIdRequest {
		$this->counterName = $counterName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteCounterByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteCounterByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withLimitName(empty($data['limitName']) ? null : $data['limitName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withCounterName(empty($data['counterName']) ? null : $data['counterName']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "limitName" => $this->getLimitName(),
            "userId" => $this->getUserId(),
            "counterName" => $this->getCounterName(),
        );
    }
}