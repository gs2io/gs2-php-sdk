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

namespace Gs2\Script\Result;

use Gs2\Core\Model\IResult;
use Gs2\Script\Model\Script;

/**
 * Result of createScriptFromGitHub: Create script from code in the GitHub repository
 *
 * @see https://docs.gs2.io/api_reference/script/sdk/#createscriptfromgithub
 */
class CreateScriptFromGitHubResult implements IResult {
    /** @var Script Script created */
    private $item;

    /** @return Script|null Script created */
	public function getItem(): ?Script {
		return $this->item;
	}

    /** @param Script|null $item Script created */
	public function setItem(?Script $item) {
		$this->item = $item;
	}

    /**
     * @param Script|null $item Script created
     * @return CreateScriptFromGitHubResult
     */
	public function withItem(?Script $item): CreateScriptFromGitHubResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateScriptFromGitHubResult {
        if ($data === null) {
            return null;
        }
        return (new CreateScriptFromGitHubResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Script::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}