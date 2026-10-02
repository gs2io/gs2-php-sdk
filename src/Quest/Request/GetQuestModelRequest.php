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

/**
 * Request for getQuestModel: Get Quest Model
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#getquestmodel
 */
class GetQuestModelRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Quest Group Model name */
    private $questGroupName;
    /** @var string Quest Model name */
    private $questName;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return GetQuestModelRequest
     */
	public function withNamespaceName(?string $namespaceName): GetQuestModelRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Quest Group Model name */
	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}
    /** @param string|null $questGroupName Quest Group Model name */
	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}
    /**
     * @param string|null $questGroupName Quest Group Model name
     * @return GetQuestModelRequest
     */
	public function withQuestGroupName(?string $questGroupName): GetQuestModelRequest {
		$this->questGroupName = $questGroupName;
		return $this;
	}
    /** @return string|null Quest Model name */
	public function getQuestName(): ?string {
		return $this->questName;
	}
    /** @param string|null $questName Quest Model name */
	public function setQuestName(?string $questName) {
		$this->questName = $questName;
	}
    /**
     * @param string|null $questName Quest Model name
     * @return GetQuestModelRequest
     */
	public function withQuestName(?string $questName): GetQuestModelRequest {
		$this->questName = $questName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetQuestModelRequest {
        if ($data === null) {
            return null;
        }
        return (new GetQuestModelRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withQuestGroupName(array_key_exists('questGroupName', $data) && $data['questGroupName'] !== null ? $data['questGroupName'] : null)
            ->withQuestName(array_key_exists('questName', $data) && $data['questName'] !== null ? $data['questName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "questGroupName" => $this->getQuestGroupName(),
            "questName" => $this->getQuestName(),
        );
    }
}