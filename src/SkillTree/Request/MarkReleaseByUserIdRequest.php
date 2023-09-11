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

namespace Gs2\SkillTree\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class MarkReleaseByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var array */
    private $nodeModelNames;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): MarkReleaseByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): MarkReleaseByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getNodeModelNames(): ?array {
		return $this->nodeModelNames;
	}
	public function setNodeModelNames(?array $nodeModelNames) {
		$this->nodeModelNames = $nodeModelNames;
	}
	public function withNodeModelNames(?array $nodeModelNames): MarkReleaseByUserIdRequest {
		$this->nodeModelNames = $nodeModelNames;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): MarkReleaseByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?MarkReleaseByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new MarkReleaseByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withNodeModelNames(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('nodeModelNames', $data) && $data['nodeModelNames'] !== null ? $data['nodeModelNames'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "nodeModelNames" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getNodeModelNames() !== null && $this->getNodeModelNames() !== null ? $this->getNodeModelNames() : []
            ),
        );
    }
}