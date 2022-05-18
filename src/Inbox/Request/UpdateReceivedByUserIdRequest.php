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

namespace Gs2\Inbox\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class UpdateReceivedByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var array */
    private $receivedGlobalMessageNames;
    /** @var string */
    private $duplicationAvoider;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateReceivedByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): UpdateReceivedByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getReceivedGlobalMessageNames(): ?array {
		return $this->receivedGlobalMessageNames;
	}

	public function setReceivedGlobalMessageNames(?array $receivedGlobalMessageNames) {
		$this->receivedGlobalMessageNames = $receivedGlobalMessageNames;
	}

	public function withReceivedGlobalMessageNames(?array $receivedGlobalMessageNames): UpdateReceivedByUserIdRequest {
		$this->receivedGlobalMessageNames = $receivedGlobalMessageNames;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateReceivedByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateReceivedByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateReceivedByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withReceivedGlobalMessageNames(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('receivedGlobalMessageNames', $data) && $data['receivedGlobalMessageNames'] !== null ? $data['receivedGlobalMessageNames'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "receivedGlobalMessageNames" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getReceivedGlobalMessageNames() !== null && $this->getReceivedGlobalMessageNames() !== null ? $this->getReceivedGlobalMessageNames() : []
            ),
        );
    }
}