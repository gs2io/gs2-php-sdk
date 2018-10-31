<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Chat\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CheckEstimateScanByteByRoomRequest extends Gs2BasicRequest {

    const FUNCTION = "CheckEstimateScanByteByRoom";

	/** @var string ロビーの名前 */
	private $lobbyName;

	/** @var string ルームID */
	private $roomId;

	/** @var string 検索するユーザID文字列(部分一致) */
	private $userId;

	/** @var string 検索するメッセージテキスト文字列(部分一致) */
	private $message;

	/** @var string 検索するメッセージメタデータ文字列(部分一致) */
	private $meta;

	/** @var int 検索期間 開始日時（エポック秒） */
	private $begin;

	/** @var int 検索期間 終了日時（エポック秒） */
	private $end;

	/** @var string データの取得を開始する位置を指定するトークン */
	private $pageToken;

	/** @var int データの取得件数 */
	private $limit;


	/**
	 * ロビーの名前を取得
	 *
	 * @return string ロビーの名前
	 */
	public function getLobbyName() {
		return $this->lobbyName;
	}

	/**
	 * ロビーの名前を設定
	 *
	 * @param string $lobbyName ロビーの名前
	 */
	public function setLobbyName($lobbyName) {
		$this->lobbyName = $lobbyName;
	}

	/**
	 * ロビーの名前を設定
	 *
	 * @param string $lobbyName ロビーの名前
	 * @return CheckEstimateScanByteByRoomRequest
	 */
	public function withLobbyName($lobbyName): CheckEstimateScanByteByRoomRequest {
		$this->setLobbyName($lobbyName);
		return $this;
	}

	/**
	 * ルームIDを取得
	 *
	 * @return string ルームID
	 */
	public function getRoomId() {
		return $this->roomId;
	}

	/**
	 * ルームIDを設定
	 *
	 * @param string $roomId ルームID
	 */
	public function setRoomId($roomId) {
		$this->roomId = $roomId;
	}

	/**
	 * ルームIDを設定
	 *
	 * @param string $roomId ルームID
	 * @return CheckEstimateScanByteByRoomRequest
	 */
	public function withRoomId($roomId): CheckEstimateScanByteByRoomRequest {
		$this->setRoomId($roomId);
		return $this;
	}

	/**
	 * 検索するユーザID文字列(部分一致)を取得
	 *
	 * @return string 検索するユーザID文字列(部分一致)
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * 検索するユーザID文字列(部分一致)を設定
	 *
	 * @param string $userId 検索するユーザID文字列(部分一致)
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * 検索するユーザID文字列(部分一致)を設定
	 *
	 * @param string $userId 検索するユーザID文字列(部分一致)
	 * @return CheckEstimateScanByteByRoomRequest
	 */
	public function withUserId($userId): CheckEstimateScanByteByRoomRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 検索するメッセージテキスト文字列(部分一致)を取得
	 *
	 * @return string 検索するメッセージテキスト文字列(部分一致)
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * 検索するメッセージテキスト文字列(部分一致)を設定
	 *
	 * @param string $message 検索するメッセージテキスト文字列(部分一致)
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * 検索するメッセージテキスト文字列(部分一致)を設定
	 *
	 * @param string $message 検索するメッセージテキスト文字列(部分一致)
	 * @return CheckEstimateScanByteByRoomRequest
	 */
	public function withMessage($message): CheckEstimateScanByteByRoomRequest {
		$this->setMessage($message);
		return $this;
	}

	/**
	 * 検索するメッセージメタデータ文字列(部分一致)を取得
	 *
	 * @return string 検索するメッセージメタデータ文字列(部分一致)
	 */
	public function getMeta() {
		return $this->meta;
	}

	/**
	 * 検索するメッセージメタデータ文字列(部分一致)を設定
	 *
	 * @param string $meta 検索するメッセージメタデータ文字列(部分一致)
	 */
	public function setMeta($meta) {
		$this->meta = $meta;
	}

	/**
	 * 検索するメッセージメタデータ文字列(部分一致)を設定
	 *
	 * @param string $meta 検索するメッセージメタデータ文字列(部分一致)
	 * @return CheckEstimateScanByteByRoomRequest
	 */
	public function withMeta($meta): CheckEstimateScanByteByRoomRequest {
		$this->setMeta($meta);
		return $this;
	}

	/**
	 * 検索期間 開始日時（エポック秒）を取得
	 *
	 * @return int 検索期間 開始日時（エポック秒）
	 */
	public function getBegin() {
		return $this->begin;
	}

	/**
	 * 検索期間 開始日時（エポック秒）を設定
	 *
	 * @param int $begin 検索期間 開始日時（エポック秒）
	 */
	public function setBegin($begin) {
		$this->begin = $begin;
	}

	/**
	 * 検索期間 開始日時（エポック秒）を設定
	 *
	 * @param int $begin 検索期間 開始日時（エポック秒）
	 * @return CheckEstimateScanByteByRoomRequest
	 */
	public function withBegin($begin): CheckEstimateScanByteByRoomRequest {
		$this->setBegin($begin);
		return $this;
	}

	/**
	 * 検索期間 終了日時（エポック秒）を取得
	 *
	 * @return int 検索期間 終了日時（エポック秒）
	 */
	public function getEnd() {
		return $this->end;
	}

	/**
	 * 検索期間 終了日時（エポック秒）を設定
	 *
	 * @param int $end 検索期間 終了日時（エポック秒）
	 */
	public function setEnd($end) {
		$this->end = $end;
	}

	/**
	 * 検索期間 終了日時（エポック秒）を設定
	 *
	 * @param int $end 検索期間 終了日時（エポック秒）
	 * @return CheckEstimateScanByteByRoomRequest
	 */
	public function withEnd($end): CheckEstimateScanByteByRoomRequest {
		$this->setEnd($end);
		return $this;
	}

	/**
	 * データの取得を開始する位置を指定するトークンを取得
	 *
	 * @return string データの取得を開始する位置を指定するトークン
	 */
	public function getPageToken() {
		return $this->pageToken;
	}

	/**
	 * データの取得を開始する位置を指定するトークンを設定
	 *
	 * @param string $pageToken データの取得を開始する位置を指定するトークン
	 */
	public function setPageToken($pageToken) {
		$this->pageToken = $pageToken;
	}

	/**
	 * データの取得を開始する位置を指定するトークンを設定
	 *
	 * @param string $pageToken データの取得を開始する位置を指定するトークン
	 * @return CheckEstimateScanByteByRoomRequest
	 */
	public function withPageToken($pageToken): CheckEstimateScanByteByRoomRequest {
		$this->setPageToken($pageToken);
		return $this;
	}

	/**
	 * データの取得件数を取得
	 *
	 * @return int データの取得件数
	 */
	public function getLimit() {
		return $this->limit;
	}

	/**
	 * データの取得件数を設定
	 *
	 * @param int $limit データの取得件数
	 */
	public function setLimit($limit) {
		$this->limit = $limit;
	}

	/**
	 * データの取得件数を設定
	 *
	 * @param int $limit データの取得件数
	 * @return CheckEstimateScanByteByRoomRequest
	 */
	public function withLimit($limit): CheckEstimateScanByteByRoomRequest {
		$this->setLimit($limit);
		return $this;
	}

}