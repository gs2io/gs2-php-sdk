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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DeleteQuestModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $questGroupName;
    /** @var string */
    private $questName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DeleteQuestModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}

	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}

	public function withQuestGroupName(?string $questGroupName): DeleteQuestModelMasterRequest {
		$this->questGroupName = $questGroupName;
		return $this;
	}

	public function getQuestName(): ?string {
		return $this->questName;
	}

	public function setQuestName(?string $questName) {
		$this->questName = $questName;
	}

	public function withQuestName(?string $questName): DeleteQuestModelMasterRequest {
		$this->questName = $questName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteQuestModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteQuestModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withQuestGroupName(empty($data['questGroupName']) ? null : $data['questGroupName'])
            ->withQuestName(empty($data['questName']) ? null : $data['questName']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "questGroupName" => $this->getQuestGroupName(),
            "questName" => $this->getQuestName(),
        );
    }
}