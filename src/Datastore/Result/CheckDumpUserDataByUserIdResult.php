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

namespace Gs2\Datastore\Result;

use Gs2\Core\Model\IResult;

/**
 * Result of checkDumpUserDataByUserId: Check if the dump of the data associated with the specified user ID is complete
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#checkdumpuserdatabyuserid
 */
class CheckDumpUserDataByUserIdResult implements IResult {
    /** @var string URL of output data */
    private $url;

    /** @return string|null URL of output data */
	public function getUrl(): ?string {
		return $this->url;
	}

    /** @param string|null $url URL of output data */
	public function setUrl(?string $url) {
		$this->url = $url;
	}

    /**
     * @param string|null $url URL of output data
     * @return CheckDumpUserDataByUserIdResult
     */
	public function withUrl(?string $url): CheckDumpUserDataByUserIdResult {
		$this->url = $url;
		return $this;
	}

    public static function fromJson(?array $data): ?CheckDumpUserDataByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new CheckDumpUserDataByUserIdResult())
            ->withUrl(array_key_exists('url', $data) && $data['url'] !== null ? $data['url'] : null);
    }

    public function toJson(): array {
        return array(
            "url" => $this->getUrl(),
        );
    }
}