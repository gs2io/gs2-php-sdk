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

namespace Gs2\Exchange\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DeleteAwaitByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $rateName;
    /** @var string */
    private $awaitName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DeleteAwaitByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DeleteAwaitByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getRateName(): ?string {
		return $this->rateName;
	}

	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}

	public function withRateName(?string $rateName): DeleteAwaitByUserIdRequest {
		$this->rateName = $rateName;
		return $this;
	}

	public function getAwaitName(): ?string {
		return $this->awaitName;
	}

	public function setAwaitName(?string $awaitName) {
		$this->awaitName = $awaitName;
	}

	public function withAwaitName(?string $awaitName): DeleteAwaitByUserIdRequest {
		$this->awaitName = $awaitName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteAwaitByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteAwaitByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withAwaitName(array_key_exists('awaitName', $data) && $data['awaitName'] !== null ? $data['awaitName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "rateName" => $this->getRateName(),
            "awaitName" => $this->getAwaitName(),
        );
    }
}