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

namespace Gs2\JobQueue\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DeleteDeadLetterJobByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $deadLetterJobName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DeleteDeadLetterJobByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DeleteDeadLetterJobByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getDeadLetterJobName(): ?string {
		return $this->deadLetterJobName;
	}

	public function setDeadLetterJobName(?string $deadLetterJobName) {
		$this->deadLetterJobName = $deadLetterJobName;
	}

	public function withDeadLetterJobName(?string $deadLetterJobName): DeleteDeadLetterJobByUserIdRequest {
		$this->deadLetterJobName = $deadLetterJobName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteDeadLetterJobByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteDeadLetterJobByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDeadLetterJobName(array_key_exists('deadLetterJobName', $data) && $data['deadLetterJobName'] !== null ? $data['deadLetterJobName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "deadLetterJobName" => $this->getDeadLetterJobName(),
        );
    }
}