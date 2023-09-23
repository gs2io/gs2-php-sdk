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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DeleteEntriesByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var array */
    private $entryModelNames;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): DeleteEntriesByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): DeleteEntriesByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getEntryModelNames(): ?array {
		return $this->entryModelNames;
	}
	public function setEntryModelNames(?array $entryModelNames) {
		$this->entryModelNames = $entryModelNames;
	}
	public function withEntryModelNames(?array $entryModelNames): DeleteEntriesByUserIdRequest {
		$this->entryModelNames = $entryModelNames;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DeleteEntriesByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteEntriesByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteEntriesByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withEntryModelNames(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('entryModelNames', $data) && $data['entryModelNames'] !== null ? $data['entryModelNames'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "entryModelNames" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getEntryModelNames() !== null && $this->getEntryModelNames() !== null ? $this->getEntryModelNames() : []
            ),
        );
    }
}